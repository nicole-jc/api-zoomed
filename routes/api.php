<?php

use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CareController;

Route::apiResource('animals', AnimalController::class);

Route::apiResource('care', CareController::class);
