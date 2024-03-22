<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AuthController;
use GuzzleHttp\Middleware;
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

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Api', 'middleware'=>'api'], function () {
    Route::apiResource('user', UserController::class);
    Route::apiResource('account', AccountController::class);
    Route::post('bulk/accounts', [AccountController::class, 'bulkStore']);
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/profile', [AuthController::class,'profile']);

});