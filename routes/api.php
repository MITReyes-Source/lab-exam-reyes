<?php

use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\Api\TokenController;
use Illuminate\Support\Facades\Route;

Route::post('/tokens/create', [TokenController::class, 'store']);
Route::get('/students', [StudentApiController::class, 'index'])->middleware('auth:sanctum');
