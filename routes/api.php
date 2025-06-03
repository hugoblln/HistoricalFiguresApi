<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\FigureController;
use App\Http\Controllers\SecurityController;

Route::post('/register', [SecurityController::class, 'register']);
Route::post('/login', [SecurityController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('figures', FigureController::class);
    Route::apiResource('domains', DomainController::class);
    
    
});
