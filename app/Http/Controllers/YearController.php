<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateYear;
use App\Models\Year;
use App\Services\YearService;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function __construct(private YearService $yearService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->yearService->index($request->all()),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateYear $request)
    {
        return response()->json(
            $this->yearService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $year)
    {
        return response()->json(
            $this->yearService->show(id: $year),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Year $year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateYear $request, int $year)
    {
        return response()->json(
            $this->yearService->update($request->validated(), $year),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $year)
    {
        return response()->json(
            $this->yearService->delete($year),
            200
        );
    }
}
