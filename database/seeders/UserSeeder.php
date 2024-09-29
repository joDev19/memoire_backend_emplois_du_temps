<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\FiliereService;
use App\Services\SemestreService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    private function getUsers(FiliereService $filiereService = new FiliereService(), SemestreService $semestreService = new SemestreService()){
        return [
            [
                "name" => "Ratheil HOUNDJI",
                "email" => "ratheilhoundji@gmail.com",
            ],
            [
                "name" => "Karen HOUEHA",
                "email" => "karenhoueha@gmail.com",
                "matricule" => "15000000",
                "filiere_id" => $filiereService->index(['code' => 'GL'])->first()->id,
                "semestre_id" => $semestreService->index(['code' => 'S3'])->first()->id,
            ],
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getUsers() as $key => $user) {
            User::updateOrCreate($user, ['created_at'=>now(), 'updated_at'=>now(), "password" => Hash::make("password")]);
        }
    }
}
