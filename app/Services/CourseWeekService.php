<?php
namespace App\Services;
use App\Http\Resources\TabletimeRessource;
use App\Models\CourseWeek;
class CourseWeekService extends CrudService
{
    public function __construct()
    {
        parent::__construct(new CourseWeek());
    }

    public function storeTableTime($data)
    {
        $_data = collect($data);
        $week = null;
        if (CourseWeek::where('start', '=', $_data->get('weekStartDate'))->count() > 0) {
            $week = CourseWeek::where('start', '=', $_data->get('weekStartDate'))->first();
        } else {
            $week = parent::store([
                'start' => $_data->get('weekStartDate'),
                'end' => $_data->get('weekEndDate')
            ]);
        }
        // vérification
        $weekId = $week->id;
        foreach ($_data->get('courses') as $key => $course) {
            (new CourseService)->store(collect($course)->merge(['course_week_id' => $weekId])->toArray());
        }
        $week->refresh();
        return $week->with('courses')->findOrFail($weekId);
    }

    public function getTabletime($yearId, $weekId)
    {
        return new TabletimeRessource(CourseWeek::with('courses.filieres')->whereHas('courses', function ($query) use ($yearId): void {
            $query->whereHas('ec', function ($subQuery) use ($yearId) {
                $subQuery->whereHas('ue', function ($subSubQuery) use ($yearId) {
                    $subSubQuery->whereHas('semestre', function ($subSubSubQuery) use ($yearId) {
                        $subSubSubQuery->wherehas('year', function ($subSubSubSubQuery) use ($yearId) {
                            $subSubSubSubQuery->where('id', $yearId);
                        });
                    });
                });
            });
        })->findOrFail($weekId));
    }
}
