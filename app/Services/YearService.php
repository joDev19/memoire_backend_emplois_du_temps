<?php
namespace App\Services;
use App\Models\Year;
class YearService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Year());
    }
    public function yearStats(){
        // récupérer les years
        // prendre chaque years
            // chercher les semestres qui lui appartiennes, avec leur relations Ues et je veux le comptes des ues

            $years = Year::with('semestres.ues')
            ->get()
            ->map(function ($year) {
                // Compte le nombre total d'UE dans tous les semestres de l'année
                $year->ue_count = $year->semestres->sum(function ($semester) {
                    return $semester->ues->count();
                });
                //
                $year->responsable_count = $year->users->count();
                $year->enseignant_count = (new UserService())->getEnseignantByYear($year->id)->count();
                return $year;
            });
            //dd($years[1]);
            return $years;

    }
}
