<?php
namespace App\Services;
use App\Models\Ec;
class EcService extends CrudService {
    public function __construct(){
        parent::__construct(new Ec());
    }
    public function getByYear($id){
        return Ec::whereHas('ue', function($query) use($id){
            $query->whereHas('semestre', function($subQuery) use($id){
                $subQuery->where('year_id', $id);
            });
        })->get();
        // dd(Ec::with('ue.semestre')->toSql());
    }
}
