<?php

use App\Http\Controllers\CakeController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cakes', CakeController::class);
Route::apiResource('leads', LeadController::class);
