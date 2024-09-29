<?php
namespace App\Services;
use App\Models\Filiere;
class FiliereService extends CrudService {
    public function __construct(){
        parent::__construct(new Filiere());
    }
}
