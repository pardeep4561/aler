<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PropertyController;
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


Route::get('/blogs',[BlogController::class,'index']);
Route::get('/blog/{id}',[BlogController::class,'show']);

Route::post('/countries',[PropertyController::class,'getCountry']);
Route::post('/states',[PropertyController::class,'getStates']);
Route::post('/city',[PropertyController::class,'getCity']);

//submit property
Route::prefix('propery')->group(function () {
      Route::post('/',[PropertyController::class,'create']); 
      Route::get('/',[PropertyController::class,'index']);
      Route::get('/{id}',[PropertyController::class,'show']);
});

