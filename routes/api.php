<?php

use Illuminate\Http\Request;
use App\Http\Controllers\JWTAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Unprotected Routes - Login and Registration
Route::post("registrar", [JWTAuthController::class, "registrar"]);
Route::post("login", [JWTAuthController::class, "login"]);

// Protected Route by JWT Api Middleware
Route::group(['middleware' =>  ['apiJwt']], function(){
    Route::get('dados', [JWTAuthController::class, "dadosUser"]);
});

// Route::get('auth', [JWTAuthController::class, "getAuthenticatedUser"]);