<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
Route::middleware('auth:sanctum')->post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logout');
Route::middleware('auth:sanctum')->get('/me', [\App\Http\Controllers\Api\AuthController::class, 'me'])->name('me');
