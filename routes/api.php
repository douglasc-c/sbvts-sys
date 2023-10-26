<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
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

Broadcast::routes(['middlleware' => ['auth:sanctum']]);

# Sign in
Route::post('signin', [App\Http\Controllers\Auth\AuthController::class, 'signin']);

# Log out
Route::get('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);

# Middleware Authentication
Route::group(['middleware' => 'auth:sanctum'], function () {

    # Users group
    Route::group(['prefix' => 'users'], function () {
        # get all users
        Route::get('', [App\Http\Controllers\User\UserController::class, 'getAll']);
    });

    Route::group(['prefix' => 'user'], function () {
        # Created user
        Route::post('', [App\Http\Controllers\User\UserController::class, 'create']);

        # get user
        Route::get('/{id}', [App\Http\Controllers\User\UserController::class, 'get']);
    });
});
