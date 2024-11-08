<?php

namespace App\Http\Controllers;


use App\Http\Requests\CreateUe;
use App\Models\Ue;
use App\Services\UeService;
use Illuminate\Http\Request;

class UeController extends Controller
{
    public function __construct(private UeService $ueService){

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->ueService->index($request->all()),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->json($this->ueService->create(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUe $request)
    {
        return response()->json(
            $this->ueService->store($request->validated()),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $ue)
    {
        return response()->json(
            $this->ueService->show($ue),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ue $ue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateUe $request, int $ue)
    {
        return response()->json(
            $this->ueService->update($request->validated(), $ue),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $ue)
    {
        return response()->json(
            $this->ueService->delete($ue),
            200
        );
    }
}
