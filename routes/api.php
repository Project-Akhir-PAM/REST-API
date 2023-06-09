<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtisanController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DestinationController;

Route::group(['prefix' => 'category'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::post('/create', [CategoryController::class, 'store']);
    Route::patch('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'delete']);
});

Route::group(['prefix' => 'destination'], function () {
    Route::get('/', [DestinationController::class, 'index']);
    Route::get('/{id}', [DestinationController::class, 'show']);
    Route::post('/create', [DestinationController::class, 'store']);
    Route::patch('/update/{id}', [DestinationController::class, 'update']);
    Route::delete('/delete/{id}', [DestinationController::class, 'delete']);
});

Route::group(['prefix' => 'artisan'], function () {
    Route::get('/key', [ArtisanController::class, 'key']);
    Route::get('/seed', [ArtisanController::class, 'seed']);
    Route::get('/fresh', [ArtisanController::class, 'fresh']);
    Route::get('/cache', [ArtisanController::class, 'cache']);
    Route::get('/storage', [ArtisanController::class, 'storage']);
    Route::get('/optimize', [ArtisanController::class, 'optimize']);
});