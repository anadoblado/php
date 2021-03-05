<?php

use App\Http\Controllers\ProductoApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('apiproductos', ProductoApiController::class);

//Route::get('index',[ProductoApiController::class,'index']);
//Route::get('show/{id}',[ProductoApiController::class,'show']);
//Route::post('store',[ProductoApiController::class,'store']);
//Route::put('update/{id}',[ProductoApiController::class,'update']);
//Route::delete('destroy/{id}',[ProductoApiController::class,'destroy']);