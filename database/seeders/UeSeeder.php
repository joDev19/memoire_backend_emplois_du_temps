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
    private function getUeGlS3()
    {
        return [
            [
                'label' => "Structures algébrique et leur application en informatique",
                'code' => "MTH1321",
            ],
            [
                'label' => "Approche orientée objet",
                'code' => "INF1322",
            ],
            [
                'label' => "Structures de donnée et application avec C/Python",
                'code' => "INF1323",
            ],
            [
                'label' => "Programmation avancé en Java",
                'code' => "INF1324",
            ],
            [
                'label' => "Programmation graphique en QT/C++",
                'code' => "INF1325",
            ],
            [
                'label' => "Aspects avancés des technologies web",
                'code' => "INF1326",
            ],
            [
                'label' => "Bases du génie logiciel",
                'code' => "INF1327",
            ],
            [
                'label' => "Maintenance des appareils électroniques",
                'code' => "INF1328"
            ],
        ];
    }
    private function getUeGlS4()
    {
        return [
            [
                'label' => "Programmation avancée en python et R",
                'code' => "INF1421",
            ],
            [
                'label' => "Programmation et manipulation des données",
                'code' => "INF1422",
            ],
            [
                'label' => "Système d'information décisionnelle et sécurité",
                'code' => "INF1423",
            ],
            [
                'label' => "Génie logiciel",
                'code' => "INF1424",
            ],
            [
                'label' => "Cycle de vie d'un logiciel et assurance qualité",
                'code' => "INF1425",
            ],
            [
                'label' => "Gestion des projets",
                'code' => "GES1426",
            ],
            [
                'label' => "Communication managériale",
                'code' => "MGT1427",
            ],
            [
                'label' => "Anglais pour la communication scientifique",
                'code' => "ANG1428"
            ],
        ];
    }

    private function getUeGlS5()
    {
        return [
            [
                'label' => "Formation sur une certification en Base de données et en Ingénierie logicielle",
                'code' => "INF1521",
            ],
            [
                'label' => "Applications Informatiques et Internet",
                'code' => "INF1522",
            ],
            [
                'label' => "Veille technologique en génie logiciel",
                'code' => "INF1523",
            ],
            [
                'label' => "Hackathon de développement d'application",
                'code' => "INF1524",
            ],
            [
                'label' => "Développement avancé d'application Web",
                'code' => "INF1525",
            ],
            [
                'label' => "Développement d'application Mobiles",
                'code' => "INF1526",
            ],
            [
                'label' => "Communication",
                'code' => "CJO1527",
            ],
            [
                'label' => "Techniques entrepreneuriales",
                'code' => "TCC1528",
            ],
        ];
    }
    private function getUeGlS6()
    {
        return [
            [
                'label' => "Stage (12 semaines)",
                'code' => "STG1621",
            ],
            [
                'label' => "Discipline",
                'code' => "DIS1622",
            ],
            [
                'label' => "Rédaction et soutenance de rapport ou de mémoire (4 semaines)",
                'code' => "STN1623",
            ],
        ];
    }
    private function getFormattedData($data, $filiereCode, $semestreCode, FiliereService $filiereService = (new FiliereService()), SemestreService $semestreService = (new SemestreService()))
    {
        $formattedDatas = [];
        foreach ($data as $key => $ue) {
            array_push($formattedDatas, array_merge($ue, [
                // 'filiere_id' => $filiereService->index(['code' => $filiereCode])->first()->id,
                'semestre_id' => $semestreService->index(['code' => $semestreCode])->first()->id,
            ]));
        }
        return $formattedDatas;
    }
    private function storeUeGlS3()
    {
        $filiereCode = 'GL';
        $semestreCode = 'S3';
        $formattedDatas = $this->getFormattedData($this->getUeGlS3(), $filiereCode, $semestreCode);
        foreach ($formattedDatas as $formattedData) {
            Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
    private function storeUeGlS4()
    {
        $filiereCode = 'GL';
        $semestreCode = 'S4';
        $formattedDatas = $this->getFormattedData($this->getUeGlS4(), $filiereCode, $semestreCode);
        foreach ($formattedDatas as $formattedData) {
            Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
    private function storeUeGlS5()
    {
        $filiereCode = 'GL';
        $semestreCode = 'S5';
        $formattedDatas = $this->getFormattedData($this->getUeGlS5(), $filiereCode, $semestreCode);
        foreach ($formattedDatas as $formattedData) {
            Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
    private function storeUeGlS6()
    {
        $filiereCode = 'GL';
        $semestreCode = 'S6';
        $formattedDatas = $this->getFormattedData($this->getUeGlS6(), $filiereCode, $semestreCode);
        foreach ($formattedDatas as $formattedData) {
            Ue::updateOrCreate($formattedData, ['created_at' => now(), 'updated_at' => now()]);
        }
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->storeUeGlS3();
        $this->storeUeGlS4();
        $this->storeUeGlS5();
        $this->storeUeGlS6();
    }
}
