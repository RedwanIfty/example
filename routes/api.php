<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;


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
Route::get('/news/{type}',[APIController::class,'get']);
Route::post('/news/create',[APIController::class,'create']);
Route::get('/news/get/all',[APIController::class,'getAll']);
Route::post('/news/update/{id}',[APIController::class,'update']);
Route::post('/news/delete/{id}',[APIController::class,'delete']);
Route::get('/news/date/{postdate}',[APIController::class,'postdate']);
Route::get('/news/{type}/{postdate}',[APIController::class,'getTypeAndDate']);
Route::post('/file',[APIController::class,'file']);
Route::post('/file/delete/{id}',[APIController::class,'deleteFile']);
Route::get('/file',[APIController::class,'fileView']);