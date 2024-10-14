<?php

namespace App\Http\Controllers;

use App\Models\Ec;
use App\Services\EcService;
use App\Http\Requests\CreateEc;
use Illuminate\Http\Request;

class EcController extends Controller
{
    public function __construct(private EcService $ecService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->ecService->index($request->all()),
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
    public function store(CreateEc $request)
    {
        return response()->json(
            $this->ecService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $ec)
    {
        return response()->json(
            $this->ecService->show($ec),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ec $ec)
    {
        //
    }

    /**
     * Update the specified ecServiceresource in storage.
     */
    public function update(CreateEc $request, int $ec)
    {
        return response()->json(
            $this->ecService->update($request->validated(), $ec),
            200
        );
    }

    /**getByYear
     * Remove the specified resource from storage.
     */
    public function destroy(int $ec)
    {
        return response()->json(
            $this->ecService->delete($ec),
            200
        );
    }

    public function getByYear(int $year){
        return response()->json(
            $this->ecService->getByYear($year),
            200
        );
    }
    public function getByYearAndByFiliere(int $year, int $filiere){
        return response()->json(
            $this->ecService->getByYearAndByFiliere($year, $filiere),
            200
        );
    }
}
