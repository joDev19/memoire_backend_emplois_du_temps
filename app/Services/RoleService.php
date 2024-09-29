<?php
namespace App\Services;
use App\Models\Role;
class RoleService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new Role());
    }
}
