<?php

namespace Database\Seeders;

use App\Models\Ec;
use App\Services\FiliereService;
use App\Services\UeService;
use App\Services\UserService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EcSeeder extends Seeder
{
    // public function getEcsGLS3()
    // {
    //     $userService = new UserService();
    //     $ueService = new UeService();
    //     $professeurId = $userService->getAllProfesseur()->first()->id;
    //     return [
    //         ['label' => 'Structures algébriques et leurs applications en informatique', 'masse_horaire' => 125, 'code' => '1MTH1321', 'ue_id' => $ueService->index(['code' => 'MTH1321'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Analyse et conception orientée objet', 'masse_horaire' => 75, 'code' => '1INF1322', 'ue_id' => $ueService->index(['code' => 'INF1322'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Application avec les langages Java et C++', 'masse_horaire' => 75, 'code' => '2INF1322', 'ue_id' => $ueService->index(['code' => 'INF1322'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Structure de donnée et application avec C/Python', 'masse_horaire' => 125, 'code' => '1INF1323', 'ue_id' => $ueService->index(['code' => 'INF1323'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Programmation graphique, évènementielle et Java entreprise', 'masse_horaire' => 50, 'code' => '1INF1324', 'ue_id' => $ueService->index(['code' => 'INF1324'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Projet de validation des acquis en Java', 'masse_horaire' => 50, 'code' => '2INF1324', 'ue_id' => $ueService->index(['code' => 'INF1324'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Programmation graphique en QT/C++', 'masse_horaire' => 100, 'code' => '1INF1325', 'ue_id' => $ueService->index(['code' => 'INF1325'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Aspects avancés des technologies web', 'masse_horaire' => 50, 'code' => '1INF1326', 'ue_id' => $ueService->index(['code' => 'INF1326'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Assurance qualité et test de logiciel', 'masse_horaire' => 37, 'code' => '1INF1327', 'ue_id' => $ueService->index(['code' => 'INF1327'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Méthode Agile Scrum', 'masse_horaire' => 37, 'code' => '2INF1327', 'ue_id' => $ueService->index(['code' => 'INF1327'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Maintenance des appareils électroniques', 'masse_horaire' => 25, 'code' => '1INF1328', 'ue_id' => $ueService->index(['code' => 'INF1328'])->first()->id, 'professeur_id' => $professeurId],
    //     ];
    // }
    // public function getEcsGlS4()
    // {
    //     $userService = new UserService();
    //     $ueService = new UeService();
    //     $professeurId = $userService->getAllProfesseur()->first()->id;
    //     return [
    //         ['label' => 'Programmation avancée en Python et R', 'masse_horaire' => 100, 'code' => '1INF1421', 'ue_id' => $ueService->index(['code' => 'INF1421'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Structure de données avancées', 'masse_horaire' => 62, 'code' => '1INF1422', 'ue_id' => $ueService->index(['code' => 'INF1422'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Aspects avancés des bases de données', 'masse_horaire' => 62, 'code' => '2INF1422', 'ue_id' => $ueService->index(['code' => 'INF1422'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Système d\'information décisionnelle', 'masse_horaire' => 75, 'code' => '1INF1423', 'ue_id' => $ueService->index(['code' => 'INF1423'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Sécurité des systèmes d\'informations', 'masse_horaire' => 75, 'code' => '2INF1423', 'ue_id' => $ueService->index(['code' => 'INF1423'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Ingénierie Logicielle et les PGI/ERP', 'masse_horaire' => 62, 'code' => '1INF1424', 'ue_id' => $ueService->index(['code' => 'INF1424'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Atelier-Séminaire de développement et de présentation de logiciel', 'masse_horaire' => 62, 'code' => '2INF1424', 'ue_id' => $ueService->index(['code' => 'INF1424'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Cycle de vie d’un logiciel et assurance qualité', 'masse_horaire' => 100, 'code' => '1INF1425', 'ue_id' => $ueService->index(['code' => 'INF1425'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Conduite de projets informatiques', 'masse_horaire' => 37, 'code' => '1GES1426', 'ue_id' => $ueService->index(['code' => 'GES1426'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Stage d\'immersion et discipline', 'masse_horaire' => 37, 'code' => '2GES1426', 'ue_id' => $ueService->index(['code' => 'GES1426'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Communication managériale', 'masse_horaire' => 50, 'code' => '1MGT1427', 'ue_id' => $ueService->index(['code' => 'MGT1427'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Anglais pour la communication scientifique', 'masse_horaire' => 25, 'code' => '1ANG1428', 'ue_id' => $ueService->index(['code' => 'ANG1428'])->first()->id, 'professeur_id' => $professeurId],

    //     ];
    // }

    // public function getEcsGlS5()
    // {
    //     $userService = new UserService();
    //     $ueService = new UeService();
    //     $professeurId = $userService->getAllProfesseur()->first()->id;
    //     return [
    //         ['label' => 'Formation sur une certification en Base de données et en Ingénierie logicielle', 'masse_horaire' => 100, 'code' => '1INF1521', 'ue_id' => $ueService->index(['code' => 'INF1521'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Interface Homme-Machine et ergonomie des applications', 'masse_horaire' => 62, 'code' => '1INF1522', 'ue_id' => $ueService->index(['code' => 'INF1522'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Sécurité des applications', 'masse_horaire' => 62, 'code' => '2INF1522', 'ue_id' => $ueService->index(['code' => 'INF1522'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Veille technologique en génie logiciel', 'masse_horaire' => 100, 'code' => '1INF1523', 'ue_id' => $ueService->index(['code' => 'INF1523'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Hackathon de développement d\'application', 'masse_horaire' => 100, 'code' => '1INF1524', 'ue_id' => $ueService->index(['code' => 'INF1524'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Projets d\'initiation aux Framework', 'masse_horaire' => 50, 'code' => '1INF1525', 'ue_id' => $ueService->index(['code' => 'INF1525'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Conception et développement d\'APIs', 'masse_horaire' => 50, 'code' => '2INF1525', 'ue_id' => $ueService->index(['code' => 'INF1525'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Développement d\'applications Mobiles', 'masse_horaire' => 100, 'code' => '1INF1526', 'ue_id' => $ueService->index(['code' => 'INF1526'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Force de vente et communication digitale', 'masse_horaire' => 37, 'code' => '1CJO1527', 'ue_id' => $ueService->index(['code' => 'CJO1527'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Outils de rédaction de mémoire', 'masse_horaire' => 37, 'code' => '2CJO1527', 'ue_id' => $ueService->index(['code' => 'CJO1527'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Techniques entrepreneuriales', 'masse_horaire' => 50, 'code' => '1TCC1528', 'ue_id' => $ueService->index(['code' => 'TCC1528'])->first()->id, 'professeur_id' => $professeurId],

    //     ];
    // }

    // public function getEcsGlS6(){
    //     $userService = new UserService();
    //     $ueService = new UeService();
    //     $professeurId = $userService->getAllProfesseur()->first()->id;
    //     return [
    //         ['label' => 'Stage (12 semaines)', 'masse_horaire' => 425, 'code' => '1STG1621', 'ue_id' => $ueService->index(['code' => 'STG1621'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Discipline', 'masse_horaire' => 25, 'code' => '1DIS1622', 'ue_id' => $ueService->index(['code' => 'DIS1622'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Rédaction de mémoire ou de rapport', 'masse_horaire' => 150, 'code' => '1STN1623', 'ue_id' => $ueService->index(['code' => 'STN1623'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Pre-soutenance', 'masse_horaire' => 100, 'code' => '2STN1623', 'ue_id' => $ueService->index(['code' => 'STN1623'])->first()->id, 'professeur_id' => $professeurId],
    //         ['label' => 'Soutenance', 'masse_horaire' => 50, 'code' => '3STN1623', 'ue_id' => $ueService->index(['code' => 'STN1623'])->first()->id, 'professeur_id' => $professeurId],
    //     ];
    // }
    // public function storeEcsGlS3()
    // {
    //     foreach ($this->getEcsGLS3() as $key => $ec) {
    //         Ec::updateOrCreate($ec, ['updated_at' => now(), 'created_at' => now()]);
    //     }
    // }
    // public function storeEcsGlS4()
    // {
    //     foreach ($this->getEcsGLS4() as $key => $ec) {
    //         Ec::updateOrCreate($ec, ['updated_at' => now(), 'created_at' => now()]);
    //     }
    // }
    // public function storeEcsGlS5(){
    //     foreach ($this->getEcsGlS5() as $key => $ec) {
    //         Ec::updateOrCreate($ec, ['updated_at' => now(), 'created_at' => now()]);
    //     }
    // }
    // public function storeEcsGlS6(){
    //     foreach ($this->getEcsGlS6() as $key => $ec) {
    //         Ec::updateOrCreate($ec, ['updated_at' => now(), 'created_at' => now()]);
    //     }
    // }
    /**
     * Run the database seeds.
     */
    public function __construct(private $filiereService = new FiliereService(), private $ueService = new UeService(), private $userService = new UserService())
    {

    }
    public function getData()
    {
        $glId = $this->filiereService->filter(['code' => 'GL'])->first()->id;
        $siId = $this->filiereService->filter(['code' => 'SI'])->first()->id;
        $imId = $this->filiereService->filter(['code' => 'IM'])->first()->id;
        $iaId = $this->filiereService->filter(['code' => 'IA'])->first()->id;
        $seiotId = $this->filiereService->filter(['code' => 'SEIOT'])->first()->id;

        return [
            // semestre 3
            [
                "code" => "1MTH1321",
                "label" => "Structures algébriques et leurs applications en informatique",
                "masse_horaire" => "30",
                "ue_id" => $this->ueService->filter(["code" => "MTH1321"])->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId, $glId, $iaId, $imId, $seiotId],
            ],
            [
                "code" => "1INF1322",
                "label" => "Analyse et conception orientée objet",
                "masse_horaire" => "10",
                "ue_id" => $this->ueService->filter(["code" => "INF1322"])->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId, $glId, $iaId, $imId, $seiotId],
            ],
            [
                "code" => "2INF1322",
                "label" => "Application avec les langages Java et C++",
                "masse_horaire" => "20",
                "ue_id" => $this->ueService->filter(["code" => "INF1322"])->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId, $glId, $imId, $iaId, $seiotId],
            ],
            [
                "code" => "1INF1323",
                "label" => "Structure de données et applications avec C/Python",
                "masse_horaire" => "20",
                "ue_id" => $this->ueService->filter(["code" => "INF1323"])->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId, $glId, $iaId, $imId, $seiotId],
            ],
            [
                "code" => "1INF1324",
                "label" => "Administration système et résaux sous linux",
                "masse_horaire" => "10",
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($siId) {
                    $query->where('filieres.id', $siId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId,],
            ],
            [
                "code" => "1INF1324",
                "label" => "Électricité et électronique analogique",
                "masse_horaire" => 15,
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($seiotId) {
                    $query->where('filieres.id', $seiotId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$seiotId,],
            ],
            [
                "code" => "1INF1324",
                "label" => "Programmation graphique, événementielle et Java entreprise",
                "masse_horaire" => 15,
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($imId) {
                    $query->where('filieres.id', $imId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$imId,],
            ],
            [
                "code" => "1MTH1324",
                "label" => "Concepts théoriques en statistiques et probabilités en apprentissage automatique",
                "masse_horaire" => 15,
                "ue_id" => $this->ueService->filter(["code" => "MTH1324"])->whereHas('filieres', function ($query) use ($iaId) {
                    $query->where('filieres.id', $iaId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$iaId,],
            ],
            [
                "code" => "2MTH1324",
                "label" => "Applications de l'analyse statistique",
                "masse_horaire" => 5,
                "ue_id" => $this->ueService->filter(["code" => "MTH1324"])->whereHas('filieres', function ($query) use ($iaId) {
                    $query->where('filieres.id', $iaId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$iaId,],
            ],
            [
                "code" => "1INF1324",
                "label" => "Programmation graphique, évènementielle et Java entreprise",
                "masse_horaire" => "15",
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($glId) {
                    $query->where('filieres.id', $glId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$glId],
            ],
            [
                "code" => "2INF1324",
                "label" => "Électronique numérique",
                "masse_horaire" => 15,
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($seiotId) {
                    $query->where('filieres.id', $seiotId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$seiotId],
            ],
            [
                "code" => "2INF1324",
                "label" => "Administration système et résaux sous windows",
                "masse_horaire" => 10,
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($siId) {
                    $query->where('filieres.id', $siId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId],
            ],
            [
                "code" => "2INF1324",
                "label" => "Projet de validation des acquis en Java",
                "masse_horaire" => "10",
                "ue_id" => $this->ueService->filter(["code" => "INF1324"])->whereHas('filieres', function ($query) use ($glId) {
                    $query->where('filieres.id', $glId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$glId],
            ],
            [
                "code" => "1INF1325",
                "label" => "Sécurité des systèmes informatiques",
                "masse_horaire" => "15",
                "ue_id" => $this->ueService->filter(["code" => "INF1325"])->whereHas('filieres', function ($query) use ($siId) {
                    $query->where('filieres.id', $siId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId],
            ],
            [
                "code" => "1INF1325",
                "label" => "Automates programmable et asservissement",
                "masse_horaire" => 20,
                "ue_id" => $this->ueService->filter(["code" => "INF1325"])->whereHas('filieres', function ($query) use ($seiotId) {
                    $query->where('filieres.id', $seiotId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$seiotId],
            ],
            [
                "code" => "1INF1325",
                "label" => "Concepts et application de l'intelligence artificielle",
                "masse_horaire" => 20,
                "ue_id" => $this->ueService->filter(["code" => "INF1325"])->whereHas('filieres', function ($query) use ($iaId) {
                    $query->where('filieres.id', $iaId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$iaId],
            ],
            [
                "code" => "1INF1325",
                "label" => "Programmation C#",
                "masse_horaire" => 15,
                "ue_id" => $this->ueService->filter(["code" => "INF1325"])->whereHas('filieres', function ($query) use ($imId) {
                    $query->where('filieres.id', $imId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$imId],
            ],
            [
                "code" => "1INF1325",
                "label" => "Programmation graphique en QT/C++",
                "masse_horaire" => "15",
                "ue_id" => $this->ueService->filter(["code" => "INF1325"])->whereHas('filieres', function ($query) use ($glId) {
                    $query->where('filieres.id', $glId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$glId],
            ],
            [
                "code" => "1INF1326",
                "label" => "Aspects avancés des technologies web",
                "masse_horaire" => "10",
                "ue_id" => $this->ueService->filter(["code" => "INF1326"])->whereHas('filieres', function ($query) use ($glId) {
                    $query->where('filieres.id', $glId);
                })
                    ->whereHas('filieres', function ($query) use ($imId) {
                        $query->where('filieres.id', $imId);
                    })
                    ->whereHas('filieres', function ($query) use ($iaId) {
                        $query->where('filieres.id', $iaId);
                    })
                    ->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$glId, $imId, $iaId],
            ],
            [
                "code" => "1INF1326",
                "label" => "Management de la sécurité du système d'information",
                "masse_horaire" => "10",
                "ue_id" => $this->ueService->filter(["code" => "INF1326"])->whereHas('filieres', function ($query) use ($siId) {
                    $query->where('filieres.id', $siId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId],
            ],
            [
                "code" => "1INF1326",
                "label" => "Capteurs et actionneurs",
                "masse_horaire" => 20,
                "ue_id" => $this->ueService->filter(["code" => "INF1326"])->whereHas('filieres', function ($query) use ($seiotId) {
                    $query->where('filieres.id', $seiotId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$seiotId],
            ],
            [
                "code" => "1INF1327",
                "label" => "Assurance qualité et test de logiciel",
                "masse_horaire" => "10",
                "ue_id" => $this->ueService->filter(["code" => "INF1327"])->whereHas('filieres', function ($query) use ($glId, $iaId) {
                    $query->where('filieres.id', $glId); // Spécification de la table 'filieres'
                })->whereHas('filieres', function ($query) use ($iaId) {
                    $query->where('filieres.id', $iaId);
                })->whereHas('filieres', function ($query) use ($seiotId) {
                    $query->where('filieres.id', $seiotId);
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$glId, $iaId, $seiotId],
            ],
            [
                "code" => "1INF1327",
                "label" => "Filtrage des accès",
                "masse_horaire" => "5",
                "ue_id" => $this->ueService->filter(["code" => "INF1327"])->whereHas('filieres', function ($query) use ($siId) {
                    $query->where('filieres.id', $siId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId],
            ],
            [
                "code" => "1PHY1327",
                "label" => "Fondements du multimédia",
                "masse_horaire" => 10,
                "ue_id" => $this->ueService->filter(["code" => "PHY1327"])->whereHas('filieres', function ($query) use ($imId) {
                    $query->where('filieres.id', $imId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$imId],
            ],
            [
                "code" => "2INF1327",
                "label" => "Méthode Agile Scrum",
                "masse_horaire" => 10,
                "ue_id" => $this->ueService->filter(["code" => "INF1327"])->whereHas('filieres', function ($query) use ($glId) {
                    $query->where('filieres.id', $glId); // Spécification de la table 'filieres'
                })->whereHas('filieres', function ($query) use ($iaId) {
                    $query->where('filieres.id', $iaId); // Spécification de la table 'filieres'
                })->whereHas('filieres', function ($query) use ($seiotId) {
                    $query->where('filieres.id', $seiotId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$glId, $iaId, $seiotId],
            ],
            [
                "code" => "2PHY1327",
                "label" => "Physique pour le multimédia",
                "masse_horaire" => 20,
                "ue_id" => $this->ueService->filter(["code" => "PHY1327"])->whereHas('filieres', function ($query) use ($imId) {
                    $query->where('filieres.id', $imId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$imId],
            ],
            [
                "code" => "2INF1327",
                "label" => "Étude des protocoles",
                "masse_horaire" => "5",
                "ue_id" => $this->ueService->filter(["code" => "INF1327"])->whereHas('filieres', function ($query) use ($siId) {
                    $query->where('filieres.id', $siId); // Spécification de la table 'filieres'
                })->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId],
            ],
            [
                "code" => "1INF1328",
                "label" => "Maintenance des appareils électroniques",
                "masse_horaire" => "5",
                "ue_id" => $this->ueService->filter(["code" => "INF1328"])->whereHas('filieres', function ($query) use ($glId) {
                    $query->where('filieres.id', $glId);
                })
                    ->whereHas('filieres', function ($query) use ($siId) {
                        $query->where('filieres.id', $siId);
                    })
                    ->whereHas('filieres', function ($query) use ($imId) {
                        $query->where('filieres.id', $imId);
                    })
                    ->whereHas('filieres', function ($query) use ($glId) {
                        $query->where('filieres.id', $glId);
                    })
                    ->whereHas('filieres', function ($query) use ($iaId) {
                        $query->where('filieres.id', $iaId);
                    })
                    ->whereHas('filieres', function ($query) use ($seiotId) {
                        $query->where('filieres.id', $seiotId);
                    })
                    ->first()->id,
                "professeur_id" => $this->userService->getAllProfesseur()->first()->id,
                "filieres_id" => [$siId, $glId, $imId, $iaId, $seiotId],
            ],
            // semestre 4


        ];
    }
    public function storeData($ec)
    {
        $ecCollect = collect($ec);
        $ec = Ec::updateOrCreate($ecCollect->except(['filieres_id'])->toArray(), ['created_at' => now(), 'updated_at' => now()]);
        $ec->filieres()->attach($ecCollect->only('filieres_id')->first());

    }
    public function run(): void
    {
        foreach ($this->getData() as $key => $ec) {
            $this->storeData($ec);
        }
        // $this->storeEcsGlS3();
        // $this->storeEcsGlS4();
        // $this->storeEcsGlS5();
        // $this->storeEcsGlS6();
    }
}
