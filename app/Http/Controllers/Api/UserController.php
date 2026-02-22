<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = $this->userService->getAll($request->all());

        return (new UserCollection($users))->additional([
            'message' => 'get all user success',
            'status' => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->userService->createUser($request);

        if ($user) {
            return \response()->json([
                'data' => new UserResource($user),
                'message' => 'create user success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'create user fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userService->getUserById($id);

        return \response()->json([
            'data' => new UserResource($user),
            'message' => 'get user success',
            'status' => Response::HTTP_OK,
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = $this->userService->updateUser($request, $id);

        if ($user) {
            return \response()->json([
                'data' => new UserResource($user),
                'message' => 'update user success',
                'status' => Response::HTTP_OK
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'update user fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->userService->deleteUserById($id);

        if ($result) {
            return \response()->json([
                'message' => 'delete user success',
                'status' => Response::HTTP_OK,
            ], Response::HTTP_OK);
        }

        return \response()->json([
            'message' => 'delete user fail',
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
