<?php

use App\Http\Controllers\Api\{LoginController, ProfileController, UserController};
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

Route::post('register', [LoginController::class, "Register"]);
Route::post('login', [LoginController::class, "Login"]);
Route::get('showlog/{email}', [UserController::class, "showUserLog"]);

Route::middleware("auth:api")->group(function (){
    Route::get('userlog', [UserController::class, "GetUserLog"]);
    Route::post('userlog', [UserController::class, "SaveUserLog"]);
    Route::post("profile", [ProfileController::class, "store"]);
    Route::post("mac", [ProfileController::class, "mac"]);
});
