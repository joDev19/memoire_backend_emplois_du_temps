<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUser;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UpdateUser;
use App\Services\FiliereService;
use App\Services\RoleService;
use App\Services\UserService;
use App\Services\YearService;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json(
            $this->userService->index($request->all()),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $yearService = new YearService();
        $roleService = new RoleService();
        $filiereService = new FiliereService();
        $data = [
            'years' => $yearService->index(),
            'roles' => $roleService->index(),
            'filieres' => $filiereService->index(),
        ];
        // years
        // roles
        // filieres
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUser $request)
    {
        return response()->json(
            $this->userService->store($this->userService->userPasswordHasher($request->validated())),
            201
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $user)
    {
        return response()->json(
            $this->userService->show($user),
            200
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUser $request, int $user)
    {
        // dd($request->validated());
        return response()->json(
            $this->userService->update($request->validated(), $user),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $user)
    {
        return response()->json(
            $this->userService->delete($user),
            200
        );
    }

    public function login(LoginRequest $request)
    {
        return response()->json($this->userService->login($request->email, $request->password, $request->matricule), 200);
    }

    public function logout(){
        return response()->json($this->userService->logout());
    }


}
