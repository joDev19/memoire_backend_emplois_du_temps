<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FiliereSeeder extends Seeder
{
    private function getFilieres(){
        return [
            [
                'label' => 'Génie Logiciel',
                'code' => 'GL',
            ],
            [
                'label' => 'Internet et Multimédia',
                'code' => 'IM',
            ],
            [
                'label' => 'Sécurité Informatique',
                'code' => 'SI',
            ],
            [
                'label' => 'Intélligence Artificiel',
                'code' => 'IA',
            ],
            [
                'label' => 'Système Embarqué et Internet Of Thing',
                'code' => 'SEIOT',
            ],

        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getFilieres() as $filiere) {
            Filiere::updateOrCreate($filiere, ['updated_at' => now(), 'created_at' => now()]);
        }
    }
}
