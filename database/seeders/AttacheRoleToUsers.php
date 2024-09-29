<?php

namespace Database\Seeders;

use App\Models\Classe;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttacheRoleToUsers extends Seeder
{
    private function getUserByEmail($email)
    {
        return (new UserService())->index(['email' =>$email])->first();
    }
    private function getEmails(){
        return ['ratheilhoundji@gmail.com', 'karenhoueha@gmail.com'];
    }
    private function getCoordinateurId(){
        return (new RoleService())->index(['label' => 'coordinateur'])->first()->id;
    }
    private function getProfesseurId(){
        return (new RoleService())->index(['label' => 'professeur'])->first()->id;
    }
    private function getResponsableId(){
        return (new RoleService())->index(['label' => 'responsable'])->first()->id;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getEmails() as $email) {
            if($email != 'ratheilhoundji@gmail.com'){
                $this->getUserByEmail($email)->roles()->attach($this->getResponsableId());
            }else{
                $this->getUserByEmail($email)->roles()->attach([$this->getProfesseurId(), $this->getCoordinateurId()]);
            }
        }
    }
}
