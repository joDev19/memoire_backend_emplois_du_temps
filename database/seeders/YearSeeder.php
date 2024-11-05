<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    private function getYears()
    {
        return [
            ['label' => 'L1'],
            ['label' => 'L2'],
            ['label' => 'L3'],
            ['label' => 'M1'],
            ['label' => 'M2'],
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getYears() as $key => $year) {
            Year::updateOrCreate($year, ['updated_at'=>now(), 'created_at'=>now()]);
        }
    }
}
