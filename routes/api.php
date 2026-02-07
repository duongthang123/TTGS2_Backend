<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\RankController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me'])->name('me');

//Role
Route::middleware('auth:sanctum')->resource('roles', RoleController::class);
Route::middleware('auth:sanctum')->resource('positions', PositionController::class);
Route::middleware('auth:sanctum')->resource('ranks', RankController::class);
