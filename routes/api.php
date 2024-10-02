<?php

use App\Http\Controllers\dokterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Dokter
Route::get('/dokter' ,[dokterController::class,'index']);
Route::post('/dokter', [dokterController::class, 'store']);
Route::patch('/dokter/{dokter}', [dokterController::class, 'update']);
Route::delete('/dokter', [dokterController::class, 'destroy']);

//TODO:Route Pasien

//TODO:Route Ruang

//TODO:Route Rawat Inap