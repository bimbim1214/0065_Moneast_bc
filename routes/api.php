<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuahController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/buah', [BuahController::class, 'index']);
Route::post('/buah', [BuahController::class, 'store']);
Route::get('/buah/{id}', [BuahController::class, 'show']);
Route::put('/buah/{id}', [BuahController::class, 'update']);
Route::delete('/buah/{id}', [BuahController::class, 'destroy']);
