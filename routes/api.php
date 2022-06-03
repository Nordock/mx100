<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AplikanController;
use App\Http\Controllers\API\LowonganController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login',[AuthController::class,'login']);

// Route::apiResource('aplikan',AplikanController::class);
// Route::post('/aplikan/{id}',[AplikanController::class,'update']);

// Route::apiResource('lowongan',LowonganController::class);

Route::group(['middleware'=>'auth:sanctum'],function() {
    Route::apiResource('aplikan',AplikanController::class);
    Route::post('/aplikan/{id}',[AplikanController::class,'update']);

    Route::apiResource('lowongan',LowonganController::class);
});

