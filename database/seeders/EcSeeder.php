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
            ['label' => 'Analyse et conception orientée objet', 'masse_horaire' => 75, 'code'=>'1INF1322', 'ue_id' => $ueService->index(['code' =>'INF1322'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Application avec les langages Java et C++', 'masse_horaire' => 75, 'code' => '2INF1322', 'ue_id' => $ueService->index(['code' =>'INF1322'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Structure de donnée et application avec C/Python', 'masse_horaire' => 125, 'code' => '1INF1323', 'ue_id' => $ueService->index(['code' =>'INF1323'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Programmation graphique, évènementielle et Java entreprise', 'masse_horaire' => 50, 'code' => '1INF1324', 'ue_id' => $ueService->index(['code' =>'INF1324'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Projet de validation des acquis en Java', 'masse_horaire' => 50, 'code' => '2INF1324', 'ue_id' => $ueService->index(['code' =>'INF1324'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Programmation graphique en QT/C++', 'masse_horaire' => 100, 'code' => '1INF1325', 'ue_id' => $ueService->index(['code' =>'INF1325'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Aspects avancés des technologies web', 'masse_horaire' => 50, 'code' => '1INF1326', 'ue_id' => $ueService->index(['code' =>'INF1326'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Assurance qualité et test de logiciel', 'masse_horaire' => 37, 'code' => '1INF1327', 'ue_id' => $ueService->index(['code' =>'INF1327'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Méthode Agile Scrum', 'masse_horaire' => 37, 'code' => '2INF1327', 'ue_id' => $ueService->index(['code' =>'INF1327'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Maintenance des appareils électroniques', 'masse_horaire' => 25, 'code' => '1INF1328', 'ue_id' => $ueService->index(['code' =>'INF1328'])->first()->id, 'professeur_id'=> $professeurId],
        ];
    }
    public function getEcsGlS4(){
        $userService = new UserService();
        $ueService = new UeService();
        $professeurId = $userService->getAllProfesseur()->first()->id;
        return [
            ['label' => 'Programmation avancée en Python et R', 'masse_horaire' => 100, 'code'=>'1INF1421', 'ue_id' => $ueService->index(['code' =>'INF1421'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Structure de données avancées', 'masse_horaire' => 62, 'code'=>'1INF1422', 'ue_id' => $ueService->index(['code' =>'INF1422'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Aspects avancés des bases de données', 'masse_horaire' => 62, 'code'=>'2INF1422', 'ue_id' => $ueService->index(['code' =>'INF1422'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Système d\'information décisionnelle', 'masse_horaire' => 75, 'code'=>'1INF1423', 'ue_id' => $ueService->index(['code' =>'INF1423'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Sécurité des systèmes d\'informations', 'masse_horaire' => 75, 'code'=>'2INF1423', 'ue_id' => $ueService->index(['code' =>'INF1423'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Ingénierie Logicielle et les PGI/ERP', 'masse_horaire' => 62, 'code'=>'1INF1424', 'ue_id' => $ueService->index(['code' =>'INF1424'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Atelier-Séminaire de développement et de présentation de logiciel', 'masse_horaire' => 62, 'code'=>'2INF1424', 'ue_id' => $ueService->index(['code' =>'INF1424'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Cycle de vie d’un logiciel et assurance qualité', 'masse_horaire' => 100, 'code'=>'1INF1425', 'ue_id' => $ueService->index(['code' =>'INF1425'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Conduite de projets informatiques', 'masse_horaire' => 37, 'code'=>'1GES1426', 'ue_id' => $ueService->index(['code' =>'GES1426'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Stage d\'immersion et discipline', 'masse_horaire' => 37, 'code'=>'2GES1426', 'ue_id' => $ueService->index(['code' =>'GES1426'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Communication managériale', 'masse_horaire' => 50, 'code'=>'1MGT1427', 'ue_id' => $ueService->index(['code' =>'MGT1427'])->first()->id, 'professeur_id'=> $professeurId],
            ['label' => 'Anglais pour la communication scientifique', 'masse_horaire' => 25, 'code'=>'1ANG1428', 'ue_id' => $ueService->index(['code' =>'ANG1428'])->first()->id, 'professeur_id'=> $professeurId],

        ];
    }
    public function storeEcsGlS3(){
        foreach ($this->getEcsGLS3() as $key => $ec) {
            Ec::updateOrCreate($ec, ['updated_at'=>now(), 'created_at'=>now()]);
        }
    }
    public function storeEcsGlS4(){
        foreach ($this->getEcsGLS4() as $key => $ec) {
            Ec::updateOrCreate($ec, ['updated_at'=>now(), 'created_at'=>now()]);
        }
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->storeEcsGlS3();
        $this->storeEcsGlS4();
    }
}
