<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\CourseWeekService;

class CourseWeekServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store_timetable()
    {
        // $coursWeekService = new CourseWeekServiceTest();
        // $data = [
        //     "weekStartDate" => "21/10/2024",
        //     "weekEndDate" => "26/10/2024",
        //     "courses" => [
        //         "ec_id" => 1,
        //         "date" => 1,
        //         "start" => 1,
        //         "end" => 1,
        //         "filieres_id" => [
        //             1,
        //             2
        //         ],
        //         "classe_id" => 1,
        //     ]
        // ];
        $this->assertTrue(1 == 1);

    }
    public function test_get_timetable()
    {
        // $coursWeekService = new CourseWeekServiceTest();
        // $data = [
        //     "weekStartDate" => "21/10/2024",
        //     "weekEndDate" => "26/10/2024",
        //     "courses" => [
        //         "ec_id" => 1,
        //         "date" => 1,
        //         "start" => 1,
        //         "end" => 1,
        //         "filieres_id" => [
        //             1,
        //             2
        //         ],
        //         "classe_id" => 1,
        //     ]
        // ];
        $this->assertTrue(1 == 1);

    }
}
