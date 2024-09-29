<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    private function getClasses()
    {
        return [
            ['label' => 'PADTICE', 'max_capacity' => 60],
            ['label' => 'MOOCS', 'max_capacity' => 50],
            ['label' => 'IRAN2', 'max_capacity' => 160],
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getClasses() as $classe) {
            Classe::updateOrCreate($classe, ['updated_at' => now(), 'created_at' => now()]);
        }
    }
}
