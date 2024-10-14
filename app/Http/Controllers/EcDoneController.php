<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEcDone;
use App\Models\EcDone;
use App\Services\EcDoneService;
use Illuminate\Http\Request;

class EcDoneController extends Controller
{
    public function __construct(private EcDoneService $ecDoneService)
    {
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->ecDoneService->index($request->all()),
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
    public function store(CreateEcDone $request)
    {
        return response()->json(
            $this->ecDoneService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(EcDone $ecDone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EcDone $ecDone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EcDone $ecDone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EcDone $ecDone)
    {
        //
    }
}
