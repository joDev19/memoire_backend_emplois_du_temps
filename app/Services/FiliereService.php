<?php
namespace App\Services;
use App\Http\Resources\FiliereRessource;
use App\Models\Filiere;
class FiliereService extends CrudService {
    public function __construct(){
        parent::__construct(new Filiere());
    }
    public function show($id){
        return new FiliereRessource(parent::show($id));
    }
}
