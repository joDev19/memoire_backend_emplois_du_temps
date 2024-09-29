<?php
namespace App\Services;
use App\Models\Classe;
class ClasseService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Classe());
    }
}
