<?php

use App\Http\Controllers\GoodController;
use App\Http\Controllers\PaymentController;
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

#good restapi
Route::get('goods',  [GoodController::class, 'index']);
Route::post('goods', [GoodController::class, 'store']);
Route::get('goods/{id}',[GoodController::class , 'show']);
Route::put('goods/{id}',[GoodController::class , 'update']);
Route::delete('goods/{id}',[GoodController::class , 'destroy']);

#payment restapi
Route::get('payment',[PaymentController::class,'index']);
Route::get('payment/{id}',[PaymentController::class,'show']);
Route::post('payment',[PaymentController::class,'store']);

