<?php
namespace App\Services;
use App\Models\Year;
class YearService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Year());
    }
}
