<?php
namespace App\Services;
use App\Http\Resources\CourseRessource;
use App\Http\Resources\TabletimeRessource;
use App\Http\Resources\TimetableByFiliereRessource;
use App\Mail\Timetable;
use Illuminate\Support\Facades\Mail;
use \Spatie\LaravelPdf\Enums\Orientation;
use App\Models\CourseWeek;
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;

class CourseWeekService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new CourseWeek());
    }
    public function createDashboard()
    {
        $userService = new UserService();
        $nbrCoordonnateur = $userService->getAllCoordinateur()->count();
        $nbrEnseignants = $userService->getAllProfesseur()->count();
        $nbrResponsable = $userService->getAllResponsable()->count();
        $nbrSalleDeClasse = (new ClasseService())->index()->count();
        $nbrFiliere = (new FiliereService())->index()->count();
        $years = (new YearService())->yearStats();
        /**
         * years [
         *  label: ""
         *  nbrUe : 02,
         *  nbrEmploi : 02,
         *  nbrResponsable : 02,
         *  nbrProfesseur : 10
         * ]
         */
        return [
            "nbrCoordonnateur" => $nbrCoordonnateur,
            "nbrEnseignants" => $nbrEnseignants,
            "nbrResponsable" => $nbrResponsable,
            "nbrSalleDeClasse" => $nbrSalleDeClasse,
            "nbrFiliere" => $nbrFiliere,
            "years" => $years,
        ];
    }

    public function storeTableTime($data)
    {
        //dd($data);
        $_data = collect($data);
        $week = null;
        $courseService = new CourseService();
        if (CourseWeek::where([['start', '=', $_data->get('weekStartDate')], ['year_id', '=', $_data->get('year_id')]])->exists()) {
            $week = CourseWeek::where([['start', '=', $_data->get('weekStartDate')], ['year_id', '=', $_data->get('year_id')]])->first();
        } else {
            $week = parent::store([
                'start' => $_data->get('weekStartDate'),
                'end' => $_data->get('weekEndDate'),
                'year_id' => $_data->get('year_id'),
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
                        abort(500, 'Il y a un conflit de professeur ce: ' . $course['day'] . ' à ' . $course['start']);
                    }
                    // classe
                    if ($_course->classe_id == (new ClasseService())->show($course["classe_id"])->id) {
                        // il y a un conflit de salle de classe
                        abort(500, 'Il y a un conflit de salle de classe ce: ' . $course['day'] . ' à ' . $course['start']);
                    }
                    // filiere
                    $_filieresOfCourse = $_course->filieres->pluck('id');
                    foreach ($course['filieres_id'] as $filiereId) {
                        if (in_array($filiereId, $_filieresOfCourse->toArray())) {
                            // il y a un conflit de filieres
                            abort(500, 'Il y a un conflit de filieres ce: ' . $course['day'] . ' à ' . $course['start']);
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
        $courseWeek = CourseWeek::with('courses.filieres')->findOrFail($weekId);
        // $courseWeek = CourseWeek::with('courses.filieres')->whereHas('courses', function ($query) use ($yearId): void {
        //     $query->whereHas('ec', function ($subQuery) use ($yearId) {
        //         $subQuery->whereHas('ue', function ($subSubQuery) use ($yearId) {
        //             $subSubQuery->whereHas('semestre', function ($subSubSubQuery) use ($yearId) {
        //                 $subSubSubQuery->wherehas('year', function ($subSubSubSubQuery) use ($yearId) {
        //                     $subSubSubSubQuery->where('id', $yearId);
        //                 });
        //             });
        //         });
        //     });
        // })->findOrFail($weekId);
        if ($filiereId == null) {
            return new TabletimeRessource($courseWeek);
        }
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
    public function addFiliereToArray($filieres, $_array)
    {
        $array = $_array;
        // dd($array);
        foreach ($filieres as $filiere) {
            if (
                !$array->contains(function (string $value) use ($filiere) {
                    return $value == $filiere;
                })
            ) {
                $array->add($filiere);
            }
            # code...
        }
        return $array;
    }
    public function getAllMails($yearId, $weekId, $filiereId = null)
    {
        // récupérer les emplois cours qui sont dans l'emplois du temps à partager avec les filieres et les professeurs.
        //dd($this->getTabletime($yearId, $weekId, $filiereId)->courses);
        $cours = $filiereId != "null" ? $this->getTabletime($yearId, $weekId, $filiereId)->courses()
            ->whereHas('filieres', function ($query) use ($filiereId) {
                $query->where('filieres.id', $filiereId);
            })->with('filieres', 'ec.professeur')->get() : $this->getTabletime($yearId, $weekId, $filiereId)->courses()
                ->with('filieres', 'ec.professeur')->get();
        //dd($cournulls);
        // mettre dans un tableau les emails des professeurs.
        // dd($cours);
        $emails = collect([]);
        // mettre dans un tableau les emails des responsables.
        $userService = new UserService();
        //dd($cours->count());
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
        // dd($weekId);
        $path = public_path("/pdf_temp/");
        if (!file_exists($path)) {
            mkdir($path);
        }
        // collecter les infos du pdfs
        $timetable = $this->getTabletime($yearId, $weekId, $filiereId);
        $filieres = [];
        foreach ($timetable->courses as $key => $course) {
            # code...
            //dd($course->filieres()->pluck('code'));
            $filieres = $this->addFiliereToArray($course->filieres()->pluck('code'), collect($filieres));
        }
        // liste de toutes les filieres
        $allFilieres = (new FiliereService())->index();
        $allSalles = (new ClasseService())->index();
        $allEcs = (new EcService())->index();
        $data = [
            "filieres" => $filieres->toArray(),
            "startDate" => $timetable->start,
            "year" => (new YearService())->show($yearId)->label,
            "courses" => $timetable->courses,
            "allFilieres" => $allFilieres,
            "allEcs" => $allEcs,
            "allSalles" => $allSalles,
        ];
        $data['courses'] = $this->formatCourse($data['courses']);
        $pdfName = 'Emploi_du_temps-' . $data['year'] . '-' . date_format(date_create($data['startDate']), "d-m-Y") . '.pdf';
        //dd($data['courses'][0]);
        Pdf::view('pdfs.timetable', $data)->orientation(Orientation::Landscape)->format('a4')
            ->withBrowsershot(callback: function (Browsershot $browsershot) {
                $browsershot->scale(0.9);
                $browsershot->margins(0, 0, 0, 0);
                $browsershot->setNodeBinary('/snap/bin/node');
                $browsershot->setNpmBinary('/snap/bin/npm');
                $browsershot->timeout(6000);
            })->save($path . $pdfName);
        // emails.
        return [
            "pdfPath" => $path . '' . $pdfName,
            "year" => $data['year'],
            "startDate" => date_format(date_create($data['startDate']), "d/m/Y")
        ];
        // return view('pdfs.timetable', $data);

    }
    public function formatCourse($courses)
    {
        $data = $courses;
        foreach ($data as $key => $course) {
            # code...
            $tmp = [
                "id" => $course->id,
                "title" => $course->ec->label,
                "salle" => $course->classe->label,
                "start" => $course->day . 'T' . $course->start,
                "end" => $course->day . 'T' . $course->end,
                "prof" => '' . (new EcService())->show($course->ec_id)->professeur->name . '',
                "filieres" => array_map(function ($filiere) {
                    return $filiere['code'];
                }, $course->filieres->toArray()),
                "backgroundColor" => "white",
                "textColor" => "black",
                "masseHoraire" => '' . $course->ec->masse_horaire . '',
                "remaining_hour" => '' . $course->ec->remaining_hour . '',
            ];
            $data[$key] = $tmp;
            // $data[$key] = json_encode($tmp, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
        return $data;
    }

    public function getOldCourse($date, $yearId)
    {

        // selectionner la semaine de cours ayant la date et le year_id fourni
        $courseWeek = $this->filter([
            'start' => $date,
            'year_id' => $yearId
        ])->first();
        // // selectionner l'id semaine de cours qui à cette date de début
        // $weekId = $this->filter(['start' => $date])->first()->id;
        // // récupérer ses cours
        // // filtrer les cours en fonction de l'année
        // $courseWeek = CourseWeek::with('courses.filieres')->whereHas('courses', function ($query) use ($yearId): void {
        //     $query->whereHas('ec', function ($subQuery) use ($yearId) {
        //         $subQuery->whereHas('ue', function ($subSubQuery) use ($yearId) {
        //             $subSubQuery->whereHas('semestre', function ($subSubSubQuery) use ($yearId) {
        //                 $subSubSubQuery->wherehas('year', function ($subSubSubSubQuery) use ($yearId) {
        //                     $subSubSubSubQuery->where('id', $yearId);
        //                 });
        //             });
        //         });
        //     });
        // })->findOrFail($weekId);
        $courses = [];
        if($courseWeek != null){
            $courses = $courseWeek->courses;
        }else{
            abort(500, "Pas d'emploi du temps pour la semaine précédente");
        }
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
    public function forward($yearId, $weekId, $filiereId)
    {
        $emails = $this->getAllMails($yearId, $weekId, $filiereId);
        //dd($emails);
        $data = $this->generatePdf($yearId, $weekId, $filiereId);
        //dd($emails);
        foreach ($emails->toArray() as $key => $email) {
            Mail::to($email)->send(new Timetable($data));
        }
        if($filiereId == "null"){
            // il a partagé pour toute les filières
            $courseWeek = CourseWeek::findOrFail($weekId);
            $courseWeek->status = "shared";
            $courseWeek->save();
        }
        return "done";

    }
    public function showBanner($date)
    {
        if ((new CourseWeekService())->index(["start" => date_format(date_create($date), "Y-m-d")])->count() > 0){
            return false;
        }
        return true;
    }
    public function getWeekByYear($yearId)
    {
        return $this->index(['year_id' => $yearId])->get();
    }
}

