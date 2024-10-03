<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\ruangController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/dokter', [dokterController::class, 'index']);
Route::post('/dokter', [dokterController::class, 'store' ]);
Route::patch('/dokter/{dokter}', [dokterController::class, 'update']);
Route::delete('/dokter/{dokter}', [dokterController::class, 'destroy']);

Route::get('/ruang', [ruangController::class, 'index']);
Route::post('/ruang', [ruangController::class, 'store']);
Route::patch('/ruang/{ruang}', [ruangController::class, 'update']);
Route::delete('/ruang/{ruang}', [ruangController::class, 'destroy']);

