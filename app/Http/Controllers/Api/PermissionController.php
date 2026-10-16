<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Permission\PermissionResource;
use App\Models\Permission;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all()->groupBy('group');
        $data = $permissions->map(function ($group) {
            return PermissionResource::collection($group);
        });
        return response()->json([
            'data' => $data,
            'message' => 'get all permissions success'
        ], Response::HTTP_OK);
    }
}
