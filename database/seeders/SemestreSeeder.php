<?php

namespace Database\Seeders;

use App\Models\Semestre;
use App\Services\YearService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SemestreSeeder extends Seeder
{
    private function getSemestres()
    {
        $l1Id = (new YearService())->index(['label' => 'L1'])->first()->id;
        $l2Id = (new YearService())->index(['label' => 'L2'])->first()->id;
        $l3Id = (new YearService())->index(['label' => 'L3'])->first()->id;
        return [
            ['label' => 'Semestre 1', 'code' => 'S1', 'year_id' => $l1Id],
            ['label' => 'Semestre 2', 'code' => 'S2', 'year_id' => $l1Id],
            ['label' => 'Semestre 3', 'code' => 'S3', 'year_id' => $l2Id],
            ['label' => 'Semestre 4', 'code' => 'S4', 'year_id' => $l2Id],
            ['label' => 'Semestre 5', 'code' => 'S5', 'year_id' => $l3Id],
            ['label' => 'Semestre 6', 'code' => 'S6', 'year_id' => $l3Id],
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getSemestres() as $semestre) {
            Semestre::updateOrCreate($semestre, ['updated_at' => now(), 'created_at' => now()]);
        }
    }
}
