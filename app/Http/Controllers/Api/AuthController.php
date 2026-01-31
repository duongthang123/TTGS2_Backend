<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * login account
     * @param AuthRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AuthRequest $request)
    {
        if(!Auth::attempt($request->only('citizen_number', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials',
                'status' => Response::HTTP_UNAUTHORIZED,
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'citizen_number' => $user->citizen_number,
                'roles' => $user->getRoleNames()
            ]
        ], Response::HTTP_OK);
    }

    /**
     * get user login info
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(Request $request)
    {
        return response()->json([
            'user' => $request->user()
        ]);
    }

    /**
     * logout account
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Đã đăng xuất khỏi tất cả thiết bị'
        ], Response::HTTP_OK);
    }
}
