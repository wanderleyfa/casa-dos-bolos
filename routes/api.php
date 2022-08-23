<?php

use App\Http\Controllers\CakeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('cakes', CakeController::class);
