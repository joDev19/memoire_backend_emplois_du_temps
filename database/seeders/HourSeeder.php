<?php

namespace Database\Seeders;

use App\Models\Hour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class HourSeeder extends Seeder
{
    public function getHours()
    {
        $begin = 7; $end = 19; $hours = [];
        while($begin < $end){
            array_push($hours, [
                'begin' => Carbon::create(null, null, null, $begin, 0)->toTimeString(),
                'end' => Carbon::create(null, null, null, ($begin+1), 0)->toTimeString()
            ],
            );
            $begin++;
        }
        return $hours;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getHours() as $key => $hour) {
            Hour::updateOrCreate($hour, ['created_at'=>now(), 'updated_at'=>now()]);
        }
    }
}
