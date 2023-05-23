<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\AuthController as AuthController;

Route::group(['middleware' => 'guest'], function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});

Route::group(['prefix' => 'user' ,'middleware' => 'user'], function () {
    Route::get('/profile', [AuthController::class, 'getUserData']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/refresh', [AuthController::class, 'refreshToken']);
});