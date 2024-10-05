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
    private function getFormattedData($data, $filiereCode, $semestreCode, FiliereService $filiereService = (new FiliereService()), SemestreService $semestreService = (new SemestreService()))
    {
        $formattedDatas = [];
        foreach ($data as $key => $ue) {
            array_push($formattedDatas, array_merge($ue, [
                'filiere_id' => $filiereService->index(['code' => $filiereCode])->first()->id,
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
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->storeUeGlS3();
        $this->storeUeGlS4();
    }
}
