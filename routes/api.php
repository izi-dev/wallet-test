<?php

use App\Http\Controllers\CreateAccountController;
use App\Http\Controllers\DepositAccountController;
use App\Http\Controllers\GetBalanceAccountController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WithDrawAccountController;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginController::class);
Route::post('/account', CreateAccountController::class)->middleware('auth:sanctum');
Route::put('/deposit/{number}', DepositAccountController::class)->middleware('auth:sanctum');
Route::put('/withdraw/{number}', WithDrawAccountController::class)->middleware('auth:sanctum');
Route::get('/balance/{number}', GetBalanceAccountController::class)->middleware('auth:sanctum');
