<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuahController;
use App\Http\Controllers\KategoriBuahController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianBuahController;



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/buah', [BuahController::class, 'index']);
Route::post('/buah', [BuahController::class, 'store']);
Route::get('/buah/{id}', [BuahController::class, 'show']);
Route::put('/buah/{id}', [BuahController::class, 'update']);
Route::delete('/buah/{id}', [BuahController::class, 'destroy']);


Route::apiResource('kategori-buah', KategoriBuahController::class);
Route::apiResource('suppliers', SupplierController::class);
// Route::apiResource('pembelianbuah', PembelianBuahController::class);

Route::post('pembelianbuah', [PembelianBuahController::class, 'store']);
Route::get('/pembelianbuah', [PembelianBuahController::class, 'index']);
Route::post('/pembelianbuah', [PembelianBuahController::class, 'store']);
Route::get('/pembelianbuah/{id}', [PembelianBuahController::class, 'show']);
Route::put('/pembelianbuah/{id}', [PembelianBuahController::class, 'update']);
Route::delete('/pembelianbuah/{id}', [PembelianBuahController::class, 'destroy']);
