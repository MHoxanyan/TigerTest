<?php

use App\Http\Controllers\Proxy\CancelNumberController;
use App\Http\Controllers\Proxy\GetNumberController;
use App\Http\Controllers\Proxy\GetSmsController;
use App\Http\Controllers\Proxy\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/getNumber', GetNumberController::class);
Route::get('/getSms', GetSmsController::class);
Route::get('/cancelNumber', CancelNumberController::class);
Route::get('/getStatus', StatusController::class);
