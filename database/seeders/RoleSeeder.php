<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function getRoles(){
        return [
            ['label' => 'professeur'],
            ['label' => 'coordinateur'],
            ['label' => 'responsable'],
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getRoles() as $key => $role) {
            Role::updateOrCreate($role, ['updated_at' => now(), 'created_at'=> now()]);
        }
    }
}
