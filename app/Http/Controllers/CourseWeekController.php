<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseWeek;
use App\Http\Requests\StoreTimetables;
use App\Models\CourseWeek;
use App\Services\CourseWeekService;
use Illuminate\Http\Request;

class CourseWeekController extends Controller
{
    public function __construct(private CourseWeekService $courseWeekService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->courseWeekService->index(), 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourseWeek $request)
    {
        return response()->json($this->courseWeekService->store($request->validated()), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $courseWeek)
    {
        return response()->json( $this->courseWeekService->show($courseWeek) ,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseWeek $courseWeek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseWeek $courseWeek)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseWeek $courseWeek)
    {
        //
    }

    public function storeTimetables(StoreTimetables $request){
        return response()->json($this->courseWeekService->storeTableTime($request->validated()), 201);
    }

    public function getTimetables($yearId, $weekId, Request $request){
        // return $request->filiere_id == null;
        return response()->json($this->courseWeekService->getTabletime($yearId, $weekId, $request->filiere_id), 200);
    }

    public function forward($yearId, $weekId){
        return response()->json($this->courseWeekService->forward($yearId, $weekId), 200);
    }
}
