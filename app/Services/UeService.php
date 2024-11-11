<?php
namespace App\Services;
use App\Http\Resources\UeRessource;
use App\Models\Ue;
class UeService extends CrudService {
    public function __construct(){
        parent::__construct(new Ue());
    }

    public function index(array|null $data = null){
        return UeRessource::collection(parent::index($data));
    }
    public function show($id){
        return new UeRessource(parent::show($id));
    }
    public function store($data){
        $ue = parent::store([
            "code" => $data["code"],
            "label" => $data["label"],
            "semestre_id" => $data["semestre_id"],
        ]);
        $ue->filieres()->attach($data['filieres_id']);
        return $ue;
        //dd($data);
    }
    public function create(){
        // return filiere and semester
        return [
            "filieres" => (new FiliereService())->index(),
            "semestres" => (new SemestreService())->index(),
        ];
    }

    public function getByYear($yearId){
        return Ue::whereHas('semestre', function($subQuery) use($yearId){
            $subQuery->where('semestres.year_id', $yearId);
        })->get();
    }
}

