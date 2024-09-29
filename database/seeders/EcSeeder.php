<?php

namespace Database\Seeders;

use App\Models\Ec;
use App\Services\UeService;
use App\Services\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcSeeder extends Seeder
{
    public function getEcsGLS3(){
        $userService = new UserService();
        $ueService = new UeService();
        $professeurId = $userService->getAllProfesseur()->first()->id;
        return [
            ['label' => 'Structures algébriques et leurs applications en informatique', 'masse_horaire' => 125, 'code'=>'1MTH1321', 'ue_id' => $ueService->index(['code' =>'MTH1321'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Analyse et conception orientée objet', 'masse_horaire' => 75, 'code'=>'1INF1322', 'ue_id' => $ueService->index(['code' =>'INF1322'])->first()->id, 'professeur_id'=> $professeurId]
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getEcsGLS3() as $key => $ec) {
            Ec::updateOrCreate($ec, ['updated_at'=>now(), 'created_at'=>now()]);
        }
    }
}
