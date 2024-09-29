<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFiliere;
use App\Models\Filiere;
use App\Services\FiliereService;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function __construct(private FiliereService $filiereService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->filiereService->index($request->all()),
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
    public function store(CreateFiliere $request)
    {
        return response()->json(
            $this->filiereService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $filiere)
    {
        return response()->json(
            $this->filiereService->show($filiere),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filiere $filiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateFiliere $request, int $filiere)
    {
        return response()->json(
            $this->filiereService->update($request->validated(), $filiere),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $filiere)
    {
        return response()->json(
            $this->filiereService->delete($filiere),
            200
        );
    }
}
