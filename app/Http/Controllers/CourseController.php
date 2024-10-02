<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourse;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct(private CourseService $courseService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $year)
    {
        // ecs by year - teachers - classes -
        return response()->json($this->courseService->create($year), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCourse $request)
    {
        return response()->json($this->courseService->store($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(int $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $course)
    {
        //
    }
}
