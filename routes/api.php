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

Route::post("registrar", [JWTAuthController::class, "registrar"]);
Route::post("login", [JWTAuthController::class, "login"]);
// Route::get('/profile', [JWTAuthController::class, "profile"]);