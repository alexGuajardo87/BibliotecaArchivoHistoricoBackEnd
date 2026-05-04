<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TiposClasificacionController;
use App\Http\Controllers\CatFondosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('login',[LoginController::class,'login'])->name('login');




Route::middleware('auth:sanctum')->group(function () {

    Route::apiResource('tipos-clasificacion', TiposClasificacionController::class); 
    Route::apiResource('cat-fondos', CatFondosController::class); 

});