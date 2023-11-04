<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->apiResource('lotes', \App\Http\Controllers\Api\LoteController::class);

//Route::get('/user/gettoken/{user}', \App\Http\Controllers\Api\UserController::getApiToken($user));
Route::get('/user/getapitoken', [\App\Http\Controllers\Api\UserController::class, 'getApiToken'])->name('users.getapitoken');