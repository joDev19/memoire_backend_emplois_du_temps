<?php
namespace App\Services;
use App\Models\Ec;
class EcService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Ec());
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
    public function getEcDone($ecId){
        return $this->show($ecId)->ecDones();
    }
    public function getTotalHourDone($ecId){
        return $this->getEcDone($ecId)->sum('nbr_hour');
    }
    public function getRemainingHour($ecId){
        return (int) ($this->show($ecId)->masse_horaire -  $this->getTotalHourDone($ecId));
    }
}
