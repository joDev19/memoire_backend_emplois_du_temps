<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\ClasseService;
use App\Services\EcService;
use App\Services\FiliereService;
use App\Services\UserService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
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
    public function create(int $year, EcService $ecService, UserService $userService, ClasseService $classeService, FiliereService $filiereService)
    {
        // ecs by year - teachers - classes -
        $data = [
            'ecs' => $ecService->getByYear($year),
            'professeurs' => $userService->getAllProfesseur(),
            'classes' => $classeService->index(),
            'filieres' => $filiereService->index()
        ];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
