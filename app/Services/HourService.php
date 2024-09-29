<?php
namespace App\Services;
use App\Models\Hour;
class HourService extends CrudService{
    public function __construct(){
        parent::__construct(new Hour());
    }
}
