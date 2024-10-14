<?php
namespace App\Services;
use App\Models\EcDone;
class EcDoneService extends CrudService{
    public function __construct()
    {
        parent::__construct(new EcDone());
    }
}
