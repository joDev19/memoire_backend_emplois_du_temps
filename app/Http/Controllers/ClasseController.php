<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClasse;
use App\Models\Classe;
use App\Services\ClasseService;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function __construct(private ClasseService $classeService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return response()->json(
            $this->classeService->index(),
            200
        );
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
    public function store(CreateClasse $request)
    {

        return response()->json(
            $this->classeService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $classe)
    {
        // dd($classe);

        return response()->json(
            $this->classeService->show($classe),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateClasse $request, int $classe)
    {

        return response()->json(
            $this->classeService->update($request->validated(), $classe),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $classe)
    {

        return response()->json(
            $this->classeService->delete($classe),
            200
        );
    }
}
