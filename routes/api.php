<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PositionController;
use App\Http\Controllers\Api\RankController;
use App\Http\Controllers\Api\UnitController;
use App\Http\Controllers\Api\UserController;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me'])->name('me');

//Role
Route::middleware('auth:sanctum')->resource('roles', RoleController::class);
Route::middleware('auth:sanctum')->resource('positions', PositionController::class);
Route::middleware('auth:sanctum')->resource('ranks', RankController::class);
Route::middleware('auth:sanctum')->resource('units', UnitController::class);
Route::middleware('auth:sanctum')->resource('users', UserController::class);
