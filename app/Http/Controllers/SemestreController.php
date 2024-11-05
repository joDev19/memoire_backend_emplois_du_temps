<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSemestre;
use App\Models\Semestre;
use App\Services\SemestreService;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    public function __construct(private SemestreService $semestreService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->semestreService->index($request->all()),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json($this->semestreService->create(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSemestre $request)
    {
        return response()->json(
            $this->semestreService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $semestre)
    {
        return response()->json(
            $this->semestreService->show($semestre),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semestre $semestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateSemestre $request, int $semestre)
    {
        return response()->json(
            $this->semestreService->update($request->validated(), $semestre),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $semestre)
    {
        return response()->json(
            $this->semestreService->delete($semestre),
            200
        );
    }

}
