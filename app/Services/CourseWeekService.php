<?php
namespace App\Services;
use App\Models\CourseWeek;
class CourseWeekService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new CourseWeek());
    }

    public function storeTableTime($data){
        $_data = collect($data);
        $week = null;
        if(CourseWeek::where('start', '=', $_data->get('weekStartDate'))->count() > 0){
            $week = CourseWeek::where('start', '=', $_data->get('weekStartDate'))->first();
        }else{
            $week = parent::store([
                'start' => $_data->get('weekStartDate'),
                'end' => $_data->get('weekEndDate')
            ]);
        }
        // vérification
        $weekId = $week->id;
        foreach ($_data->get('courses') as $key => $course) {
            (new CourseService)->store(collect($course)->merge(['course_week_id'=>$weekId])->toArray());
        }
        $week->refresh();
        return $week->with('courses')->findOrFail($weekId);
    }
}
