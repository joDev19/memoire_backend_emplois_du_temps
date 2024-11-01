<?php
namespace App\Services;
use App\Http\Resources\CourseRessource;
use App\Http\Resources\TabletimeRessource;
use App\Http\Resources\TimetableByFiliereRessource;
use App\Models\CourseWeek;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class CourseWeekService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new CourseWeek());
    }

    public function storeTableTime($data)
    {
        $_data = collect($data);
        $week = null;
        $courseService = new CourseService();
        if (CourseWeek::where('start', '=', $_data->get('weekStartDate'))->count() > 0) {
            $week = CourseWeek::where('start', '=', $_data->get('weekStartDate'))->first();
        } else {
            $week = parent::store([
                'start' => $_data->get('weekStartDate'),
                'end' => $_data->get('weekEndDate')
            ]);
        }
        // vérification
        $weekId = $week->id;
        foreach ($_data->get('courses') as $course) {
            // cas de conflits
            // prendre les cours programmé à la même date que celle envoyé dans la donnée
            $courses = $courseService->filter(['day' => $course['day']]);
            // prendre les cours dont l'heure de fin est supérieur à l'heure de début du nouveau cours
            $courses = $courses->where('end', '>', $course['start']);
            if ($courses->exists()) {
                // s'il y en a, on est dans un cas où il peut y avoir de conflit
                // parcourir les cours
                foreach ($courses->get() as $_course) {
                    // prof
                    if ($_course->ec->professeur->id == (new EcService())->show($course["ec_id"])->professeur->id) {
                        // il y a un conflit de professeur
                        abort(500, 'Il y a un conflit de professeur');
                    }
                    // classe
                    if ($_course->classe_id == (new ClasseService())->show($course["classe_id"])->id) {
                        // il y a un conflit de salle de classe
                        abort(500, 'Il y a un conflit de salle de classe');
                    }
                    // filiere
                    $_filieresOfCourse = $_course->filieres->pluck('id');
                    foreach ($course['filieres_id'] as $filiereId) {
                        if (in_array($filiereId, $_filieresOfCourse->toArray())) {
                            // il y a un conflit de filieres
                            abort(500, 'Il y a un conflit de filieres');
                        }
                    }
                }


            }

            $courseService->store(collect($course)->merge(['course_week_id' => $weekId]));
        }
        $week->refresh();
        return $week->with('courses')->findOrFail($weekId);
    }

    public function getTabletime($yearId, $weekId, $filiereId = null)
    {
        $courseWeek = CourseWeek::with('courses.filieres')->whereHas('courses', function ($query) use ($yearId): void {
            $query->whereHas('ec', function ($subQuery) use ($yearId) {
                $subQuery->whereHas('ue', function ($subSubQuery) use ($yearId) {
                    $subSubQuery->whereHas('semestre', function ($subSubSubQuery) use ($yearId) {
                        $subSubSubQuery->wherehas('year', function ($subSubSubSubQuery) use ($yearId) {
                            $subSubSubSubQuery->where('id', $yearId);
                        });
                    });
                });
            });
        })->findOrFail($weekId);
        if ($filiereId == null) {
            return new TabletimeRessource($courseWeek);
        }
        // dd($filiereId);
        //dd(new TimetableByFiliereRessource($courseWeek, $filiereId));
        return new TimetableByFiliereRessource($courseWeek, $filiereId);

    }
    public function addEmailToArray($email, $_array)
    {
        $array = $_array;
        if (
            !$array->contains(function (string $value) use ($email) {
                return $value == $email;
            })
        ) {
            $array->add($email);
        }
        return $array;
    }

    public function getAllMails($yearId, $weekId, $filiereId = null)
    {
        // récupérer les emplois cours qui sont dans l'emplois du temps à partager avec les filieres et les professeurs.
        //dd($this->getTabletime($yearId, $weekId, $filiereId)->courses);
        $cours = $this->getTabletime($yearId, $weekId, $filiereId)->courses()->with('filieres', 'ec.professeur')->get();
        //dd($cours->count());
        // mettre dans un tableau les emails des professeurs.
        // dd($cours);
        $emails = collect([]);
        // mettre dans un tableau les emails des responsables.
        $userService = new UserService();
        foreach ($cours as $key => $cour) {
            $emails = $this->addEmailToArray($cour->ec->professeur->email, $emails);
            // dd($emails);
            // avoir toutes les filieres concerné par ce cour
            // dd($cour->filieres->count());
            foreach ($cour->filieres as $key => $filiere) {
                // avoir les mails des responsables de chaque filiere
                $respoMails = $userService->getAllRespoByYearAndByFiliere($yearId, $filiere->id)->pluck('email');
                // ajouter ces mails à notre tableau
                foreach ($respoMails as $key => $mail) {
                    $emails = $this->addEmailToArray($mail, $emails);
                    // $emails->add($mail);
                }
            }
        }
        //return $users;
        return $emails;
    }
    public function generatePdf($yearId, $weekId, $filiereId)
    {
        //dd('aze');
        $path = public_path("/pdf_temp/");
        if (!file_exists($path)) {
            mkdir($path);
        }
        // Browsershot::url("http://127.0.0.1:8000/")
        //  Browsershot::url(route('test-route'))
        //     ->timeout(50000)
        //     ->setNodeBinary('/snap/bin/node')
        //     ->setNpmBinary('/snap/bin/npm')
        //     ->format('A4')
        //     ->showBackground()
        //     ->save($path . 'urlToPdf.pdf');
        Pdf::view('pdfs.timetable')->withBrowsershot(function (Browsershot $browsershot) {
            // $browsershot->scale(0.5);
            $browsershot->setNodeBinary('/snap/bin/node');
            $browsershot->setNpmBinary('/snap/bin/npm');
            $browsershot->timeout(6000);
        })->save($path . 'urlToPdf.pdf');

    }

    public function forward($yearId, $weekId, $filiereId)
    {
        $emails = $this->getAllMails($yearId, $weekId, $filiereId);
        //dd($emails);
        return $this->generatePdf($yearId, $weekId, $filiereId);

        //return $emails;
    }

    public function getOldCourse($date, $yearId)
    {

        // selectionner l'id semaine de cours qui à cette date de début
        $weekId = $this->filter(['start' => $date])->first()->id;
        // récupérer ses cours
        // filtrer les cours en fonction de l'année
        $courseWeek = CourseWeek::with('courses.filieres')->whereHas('courses', function ($query) use ($yearId): void {
            $query->whereHas('ec', function ($subQuery) use ($yearId) {
                $subQuery->whereHas('ue', function ($subSubQuery) use ($yearId) {
                    $subSubQuery->whereHas('semestre', function ($subSubSubQuery) use ($yearId) {
                        $subSubSubQuery->wherehas('year', function ($subSubSubSubQuery) use ($yearId) {
                            $subSubSubSubQuery->where('id', $yearId);
                        });
                    });
                });
            });
        })->findOrFail($weekId);
        $courses = $courseWeek->courses;
        // faire une boucle sur les cours et leur ajouter à chaque fois 1 semaine ( 7 jours )
        foreach ($courses as $key => $course) {
            $newDate = date_create($course->day);
            $interval = date_interval_create_from_date_string('7 day');
            date_add($newDate, $interval);
            $course->day = $newDate->format("Y-m-d");
        }
        // retourner un emplois du temps avec cette nouvelle date ( au même format que les emplois du temps précédent)...
        return CourseRessource::collection($courses);
    }
}
