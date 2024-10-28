<?php
namespace App\Services;
use App\Http\Resources\TabletimeRessource;
use App\Http\Resources\TimetableByFiliereRessource;
use Illuminate\Http\Request;
use App\Models\CourseWeek;
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
        foreach ($_data->get('courses') as $key => $course) {
            (new CourseService)->store(collect($course)->merge(['course_week_id' => $weekId]));
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


    }

    public function forward($yearId, $weekId, $filiereId)
    {
        $emails = $this->getAllMails($yearId, $weekId, $filiereId);
        //dd($emails);
        return $this->generatePdf($yearId, $weekId, $filiereId);

        //return $emails;
    }
}
