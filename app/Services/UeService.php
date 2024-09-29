<?php
namespace App\Services;
use App\Models\Ue;
class UeService extends CrudService {
    public function __construct(){
        parent::__construct(new Ue());
    }
}
