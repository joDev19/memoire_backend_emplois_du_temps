<?php
namespace App\Services;
use App\Models\Semestre;
class SemestreService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Semestre());
    }
}
