<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('wtf', function () {
    return Hash::make("12345678");
});

Route::post('register', [LoginController::class, "Register"]);
Route::post('login', [LoginController::class, "Login"]);
Route::get('userlog', [UserController::class,"GetUserLog"])->middleware("auth:api");
Route::post('userlog', [UserController::class,"SaveUserLog"])->middleware("auth:api");
