<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateHour;
use App\Models\Hour;
use App\Services\HourService;
use Illuminate\Http\Request;

class HourController extends Controller
{
    public function __construct(private HourService $hourService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->hourService->index($request->all()),
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
    public function store(CreateHour $request)
    {
        return response()->json(
            $this->hourService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $hour)
    {
        return response()->json(
            $this->hourService->show($hour),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hour $hour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateHour $request, int $hour)
    {
        return response()->json(
            $this->hourService->update($request->validated(), $hour),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $hour)
    {
        return response()->json(
            $this->hourService->delete($hour),
            200
        );
    }
}
