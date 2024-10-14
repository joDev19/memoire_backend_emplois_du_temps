<?php

namespace Database\Seeders;

use App\Models\Ue;
use App\Services\FiliereService;
use App\Services\SemestreService;
use Arr;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UeSeeder extends Seeder
{
    public function __construct(private $filiereService = new FiliereService())
    {
    }
    // private function getUeGlS3()
    // {
    //     return [
    //         [
    //             'label' => "Structures algébrique et leur application en informatique",
    //             'code' => "MTH1321",
    //         ],
    //         [
    //             'label' => "Approche orientée objet",
    //             'code' => "INF1322",
    //         ],
    //         [
    //             'label' => "Structures de donnée et application avec C/Python",
    //             'code' => "INF1323",
    //         ],
    //         [
    //             'label' => "Programmation avancé en Java",
    //             'code' => "INF1324",
    //         ],
    //         [
    //             'label' => "Programmation graphique en QT/C++",
    //             'code' => "INF1325",
    //         ],
    //         [
    //             'label' => "Aspects avancés des technologies web",
    //             'code' => "INF1326",
    //         ],
    //         [
    //             'label' => "Bases du génie logiciel",
    //             'code' => "INF1327",
    //         ],
    //         [
    //             'label' => "Maintenance des appareils électroniques",
    //             'code' => "INF1328"
    //         ],
    //     ];
    // }
    // private function getUeGlS4()
    // {
    //     return [
    //         [
    //             'label' => "Programmation avancée en python et R",
    //             'code' => "INF1421",
    //         ],
    //         [
    //             'label' => "Programmation et manipulation des données",
    //             'code' => "INF1422",
    //         ],
    //         [
    //             'label' => "Système d'information décisionnelle et sécurité",
    //             'code' => "INF1423",
    //         ],
    //         [
    //             'label' => "Génie logiciel",
    //             'code' => "INF1424",
    //         ],
    //         [
    //             'label' => "Cycle de vie d'un logiciel et assurance qualité",
    //             'code' => "INF1425",
    //         ],
    //         [
    //             'label' => "Gestion des projets",
    //             'code' => "GES1426",
    //         ],
    //         [
    //             'label' => "Communication managériale",
    //             'code' => "MGT1427",
    //         ],
    //         [
    //             'label' => "Anglais pour la communication scientifique",
    //             'code' => "ANG1428"
    //         ],
    //     ];
    // }

    // private function getUeGlS5()
    // {
    //     return [
    //         [
    //             'label' => "Formation sur une certification en Base de données et en Ingénierie logicielle",
    //             'code' => "INF1521",
    //         ],
    //         [
    //             'label' => "Applications Informatiques et Internet",
    //             'code' => "INF1522",
    //         ],
    //         [
    //             'label' => "Veille technologique en génie logiciel",
    //             'code' => "INF1523",
    //         ],
    //         [
    //             'label' => "Hackathon de développement d'application",
    //             'code' => "INF1524",
    //         ],
    //         [
    //             'label' => "Développement avancé d'application Web",
    //             'code' => "INF1525",
    //         ],
    //         [
    //             'label' => "Développement d'application Mobiles",
    //             'code' => "INF1526",
    //         ],
    //         [
    //             'label' => "Communication",
    //             'code' => "CJO1527",
    //         ],
    //         [
    //             'label' => "Techniques entrepreneuriales",
    //             'code' => "TCC1528",
    //         ],
    //     ];
    // }
    // private function getUeGlS6()
    // {
    //     return [
    //         [
    //             'label' => "Stage (12 semaines)",
    //             'code' => "STG1621",
    //         ],
    //         [
    //             'label' => "Discipline",
    //             'code' => "DIS1622",
    //         ],
    //         [
    //             'label' => "Rédaction et soutenance de rapport ou de mémoire (4 semaines)",
    //             'code' => "STN1623",
    //         ],
    //     ];
    // }
    // private function getFormattedData($data, $filiereCode, $semestreCode, FiliereService $filiereService = (new FiliereService()), SemestreService $semestreService = (new SemestreService()))
    // {
    //     $formattedDatas = [];
    //     foreach ($data as $key => $ue) {
    //         array_push($formattedDatas, array_merge($ue, [
    //             // 'filiere_id' => $filiereService->index(['code' => $filiereCode])->first()->id,
    //             'semestre_id' => $semestreService->index(['code' => $semestreCode])->first()->id,
    //         ]));
    //     }
    //     return $formattedDatas;
    // }
    // private function storeUeGlS3()
    // {
    //     $filiereCode = 'GL';
    //     $semestreCode = 'S3';
    //     $formattedDatas = $this->getFormattedData($this->getUeGlS3(), $filiereCode, $semestreCode);
    //     foreach ($formattedDatas as $formattedData) {
    //         Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
    //     }
    // }
    // private function storeUeGlS4()
    // {
    //     $filiereCode = 'GL';
    //     $semestreCode = 'S4';
    //     $formattedDatas = $this->getFormattedData($this->getUeGlS4(), $filiereCode, $semestreCode);
    //     foreach ($formattedDatas as $formattedData) {
    //         Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
    //     }
    // }
    // private function storeUeGlS5()
    // {
    //     $filiereCode = 'GL';
    //     $semestreCode = 'S5';
    //     $formattedDatas = $this->getFormattedData($this->getUeGlS5(), $filiereCode, $semestreCode);
    //     foreach ($formattedDatas as $formattedData) {
    //         Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
    //     }
    // }
    // private function storeUeGlS6()
    // {
    //     $filiereCode = 'GL';
    //     $semestreCode = 'S6';
    //     $formattedDatas = $this->getFormattedData($this->getUeGlS6(), $filiereCode, $semestreCode);
    //     foreach ($formattedDatas as $formattedData) {
    //         Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
    //     }
    // }

    /**
     * Run the database seeds.
     */

    public function getData()
    {
        $semestreService = new SemestreService();
        // id des filieres
        $glId = $this->filiereService->filter(['code' => 'GL'])->first()->id;
        $siId = $this->filiereService->filter(['code' => 'SI'])->first()->id;
        $imId = $this->filiereService->filter(['code' => 'IM'])->first()->id;
        $iaId = $this->filiereService->filter(['code' => 'IA'])->first()->id;
        $seiotId = $this->filiereService->filter(['code' => 'SEIOT'])->first()->id;
        // id des semestres
        $s1Id = $semestreService->filter(['code' => 'S1'])->first()->id;
        $s2Id = $semestreService->filter(['code' => 'S2'])->first()->id;
        $s3Id = $semestreService->filter(['code' => 'S3'])->first()->id;
        $s4Id = $semestreService->filter(['code' => 'S4'])->first()->id;
        $s5Id = $semestreService->filter(['code' => 'S5'])->first()->id;
        $s6Id = $semestreService->filter(['code' => 'S6'])->first()->id;
        return [
            // ue du semestre 3
            [
                "code" => "MTH1321",
                "label" => "Structures algébriques et leurs applications en informatique",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1322",
                "label" => "Approche orientée objet",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1323",
                "label" => "Structures de données et applications avec C/Python",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1324",
                "label" => "Programmation graphique, évenementielle en Java entreprise",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1324",
                "label" => "Électricité et Électronique",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "MTH1324",
                "label" => "Statistiques et probabilités pour le scientifique de la donnée",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1324",
                "label" => "Programmation avancée en Java",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1324",
                "label" => "Administration systèmes et résaux",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1325",
                "label" => "Programmation graphique en QT/C++",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1325",
                "label" => "Automates programmables et asservissement",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1325",
                "label" => "Programmation C#",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1325",
                "label" => "Concepts et applications de l'intelligence artificielle",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1325",
                "label" => "Sécurité des systèmes informatiques",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1326",
                "label" => "Aspects avancés des technologies web",
                "filieres_id" => [
                    $glId,
                    $imId,
                    $iaId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1326",
                "label" => "Capteurs et actionneurs",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1326",
                "label" => "Management de la sécurité du système d'information",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1327",
                "label" => "Bases du génie logiciel",
                "filieres_id" => [
                    $glId,
                    $iaId,
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1327",
                "label" => "Sécurité des résaux",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "PHY1327",
                "label" => "Sciences fondamentales pour le multimédia",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s3Id,
            ],
            [
                "code" => "INF1328",
                "label" => "Maintenance des appareils électroniques",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $imId,
                    $iaId,
                    $seiotId,
                ],
                "semestre_id" => $s3Id,
            ],
            // ue du semestre 4
            [
                "code" => "INF1421",
                "label" => "Programmation avancée en Python et R",
                "filieres_id" => [
                    $glId,
                    $iaId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1421",
                "label" => "Ergonomie et applications e-commerce",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1421",
                "label" => "Politique de sécurité des sytèmes d'informations",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1421",
                "label" => "Traitement du signal",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1422",
                "label" => "Programmation et manipulation des données",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1422",
                "label" => "langages de description",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1422",
                "label" => "Big data",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1422",
                "label" => "Expérience utilisateur / Interface utilisateur",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1422",
                "label" => "Commutation et routage",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1423",
                "label" => "Système d'information décisionnelle et sécurité",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1423",
                "label" => "Architecture des processeurs et microcontrôleurs",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1423",
                "label" => "Outils cloud de collecte et de traitement des données",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1423",
                "label" => "pratique SGBD avancé et le web",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1423",
                "label" => "Audit, normes de sécurité et gestion des risques et incidents",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1424",
                "label" => "Sécurité des résaux sans fil",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1424",
                "label" => "Réseaux sans fil et protocoles de communication en IoT",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1424",
                "label" => "Production audiovisuelle et jeux vidéos",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1424",
                "label" => "Concepts et applications de l'apprentissage automatique",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1424",
                "label" => "Génie Logiciel",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1425",
                "label" => "Cycle de vie d'un logiciel et assurance qualité",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1425",
                "label" => "Programmation système, réseau et temps réel",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1425",
                "label" => "Technique de résolution de problème par la recherche",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1425",
                "label" => "Techniques de dessin et art appliqué",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "INF1425",
                "label" => "Cryptographie et applications",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "GES1426",
                "label" => "Gestion des projets",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "MGT1427",
                "label" => "Communication managériale",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,

                ],
                "semestre_id" => $s4Id,
            ],
            [
                "code" => "ANG1428",
                "label" => "Anglais pour la communication scientifique",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,
                ],
                "semestre_id" => $s4Id,
            ],
            // semestre 5
            [
                "code" => "INF1521",
                "label" => "Formation sur une certification en Base de données et en Ingénierie logicielle",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1521",
                "label" => "Formation sur une certification en systèmes embarqués et internet des objets",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1521",
                "label" => "Infographie 2D et 3D",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1521",
                "label" => "Formation sur une certification en science de la donnée",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1521",
                "label" => "Formation sur une certification en sécurité (CEH, CompTIA Linux + etc...)",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1522",
                "label" => "Formation pour des certifications en cybersécurité et résaux",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1522",
                "label" => "Architecture et intercommunication d'un réseau de capteurs et internet des objets",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1522",
                "label" => "Développement d'applications basées sur l'apprentissage automatique",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1522",
                "label" => "Technologies Immersives",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1522",
                "label" => "Applications Informatiques et Internet",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1523",
                "label" => "Veille technologique en génie logiciel",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1523",
                "label" => "Veille technologique en systèmes embarqués et Internet des objets",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1523",
                "label" => "Veille technologique en Internet et Multimédia",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1523",
                "label" => "Veille technologique",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1523",
                "label" => "Veille technologique en sécurité informatique",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1524",
                "label" => "Hackathon de sécurité informatique",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1524",
                "label" => "Administration d'un réseau de capteurs et Internet des objets",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1524",
                "label" => "Hackathon en Internet et Multimédia",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1524",
                "label" => "Hackathon en science des données / Big data",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1524",
                "label" => "Hackathon de développement d'application",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1525",
                "label" => "Développement avancé d'application web",
                "filieres_id" => [
                    $glId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1525",
                "label" => "Systèmes embarqués en entreprise",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1525",
                "label" => "Formation à la certification en outils multimédia et Internet",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1525",
                "label" => "Corporation Data analytics",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1525",
                "label" => "Système de détection et de prévention d'intruision",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1526",
                "label" => "Application de la sécurité informatique en entreprise",
                "filieres_id" => [
                    $siId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1526",
                "label" => "Hackathon en systèmes embarqués et Internet des objets",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1526",
                "label" => "Outils de résolution de problèmes d'optimisation",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "INF1526",
                "label" => "Développement d'applications Mobiles",
                "filieres_id" => [
                    $glId,
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "CJO1527",
                "label" => "Communication",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "CIO1527",
                "label" => "Communication",
                "filieres_id" => [
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            [
                "code" => "TCC1528",
                "label" => "Techniques entrepreneuriales",
                "filieres_id" => [
                    $glId,
                    $siId,
                    $iaId,
                    $imId,
                    $seiotId,
                ],
                "semestre_id" => $s5Id,
            ],
            // semestre 6
            [
                "code" => "STG1621",
                "label" => "Stage (12 semaines)",
                "filieres_id" => [
                    $glId,
                    $siId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "TCC1621",
                "label" => "Stage",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "TCC1621",
                "label" => "Stage (12 semaines)",
                "filieres_id" => [
                    $imId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "DIS1622",
                "label" => "Discipline",
                "filieres_id" => [
                    $glId,
                    $siId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "TCC1622",
                "label" => "Discipline",
                "filieres_id" => [
                    $iaId,
                    $imId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "STN1623",
                "label" => "Rédaction et soutenance de rapport ou de mémoire (4 semaines)",
                "filieres_id" => [
                    $glId,
                    $siId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "TCC1623",
                "label" => "Rédaction et soutenance de mémoire (4 semaines)",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s6Id,
            ],
            [
                "code" => "TCC1623",
                "label" => "Rédaction et soutenance de rapport ou de mémoire (4 semaines)",
                "filieres_id" => [
                    $iaId,
                ],
                "semestre_id" => $s6Id,
            ],
        ];
    }
    public function storeUe($ue)
    {
        $ueCollection = collect($ue);
        //dd($ueCollection->except('filieres_id')->toArray());
        $ue = Ue::updateOrCreate($ueCollection->except('filieres_id')->toArray(), ['created_at' => now(), 'updated_at' => now()]);
        // dd($ueCollection->only('filieres_id')->first());
        $ue->filieres()->attach($ueCollection->only('filieres_id')->first());
    }
    public function run(): void
    {
        foreach ($this->getData() as $ue) {
            $this->storeUe($ue);
        }
        // $this->storeUeGlS3();
        // $this->storeUeGlS4();
        // $this->storeUeGlS5();
        // $this->storeUeGlS6();
    }
}
