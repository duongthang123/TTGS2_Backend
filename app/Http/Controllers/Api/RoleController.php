<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\Role\RoleCollection;
use App\Http\Resources\Role\RoleResource;
use App\Services\Role\RoleService;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->getAll();
        $roleCollections = new RoleCollection($roles);

        if ($roles) {
            return $roleCollections->additional([
                'message' => 'Success',
                'status' => Response::HTTP_OK,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRoleRequest $request)
    {
        $role = $this->roleService->createRole($request);
        return (new RoleResource($role))->additional([
            'message' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->roleService->getRoleById($id);

        return response()->json([
            'data' => new RoleResource($role),
            'message' => 'create success'
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        $role = $this->roleService->updateRole($request, $id);
        return response()->json([
            'data' => new RoleResource($role),
            'message' => 'update success'
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->roleService->deleteRole($id);
        if ($result) {
            return response()->json([
                'message' => 'delete success'
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'delete failed'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
