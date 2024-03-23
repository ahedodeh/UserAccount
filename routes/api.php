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



Route::middleware('admin')->group(function () {
    Route::apiResource('account', AccountController::class);
});

Route::group(['prefix' => '', 'namespace' => 'App\Http\Controllers\Api', 'middleware'=>'auth:api'], function () {
    Route::apiResource('user', UserController::class)->except(['store']);
    Route::post('user', [UserController::class, 'store'])->withoutMiddleware(['auth:api']);
    Route::post('bulk/accounts', [AccountController::class, 'bulkStore']);
    Route::post('/login', [AuthController::class,'login'])->withoutMiddleware(['auth:api']);
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/profile', [AuthController::class,'profile']);

});