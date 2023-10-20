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

// Broadcast::routes(['middlleware' => ['auth:sanctum']]);

# Sign in
Route::post('signin', [App\Http\Controllers\Auth\AuthController::class, 'signin']);

# Log out
Route::post('logout', [App\Http\Controllers\Auth\AuthController::class, 'logout']);



// Route::group(['prefix' => ''], function(){
// });
