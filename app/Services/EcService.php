<?php
namespace App\Services;
use App\Http\Resources\EcResource;
use App\Models\Ec;
class EcService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Ec());
    }

    public function index($data = null)
    {
        return EcResource::collection(parent::index($data));
    }
    public function show($id)
    {
        return new EcResource(parent::show($id));
    }
    public function getByYear($id)
    {
        return Ec::whereHas('ue', function ($query) use ($id) {
            $query->whereHas('semestre', function ($subQuery) use ($id) {
                $subQuery->where('year_id', $id);
            });
        })->get();
        // dd(Ec::with('ue.semestre')->toSql());
    }
    public function getByYearAndByFiliere($year, $filiere)
    {
        return Ec::whereHas('filieres', function ($query) use ($filiere) {
            $query->where('filieres.id', $filiere);
        })->
            whereHas('ue', function ($query) use ($year) {
                $query->whereHas('semestre', function ($subQuery) use ($year) {
                    $subQuery->where('year_id', $year);
                });
            })->get();
        // dd($year, $filiere);
    }
    public function getEcDone($ecId)
    {
        return $this->show($ecId)->ecDones();
    }
    public function getTotalHourDone($ecId)
    {
        return $this->getEcDone($ecId)->sum('nbr_hour');
    }
    public function getRemainingHour($ecId)
    {
        return (int) ($this->show($ecId)->masse_horaire - $this->getTotalHourDone($ecId));
    }
    public function create()
    {
        // return ues, filieres, enseignants
        return [
            'ues' => (new UeService())->index(),
            'filieres' => (new FiliereService())->index(),
            'enseignants' => (new UserService())->getAllProfesseur(),
        ];
    }
    public function assignTeacher($teacherId, $ecsId)
    {
        // logique.
        foreach ($ecsId as $key => $ecId) {
            $_ec = Ec::find($ecId);
            $_ec->professeur_id = $teacherId;
            $_ec->save();
        }
        return "OK";
    }
}
