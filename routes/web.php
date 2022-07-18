<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AddItemsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/show',[ImageController::class,'show'])->name('show.image');
Route::post('/show',[ImageController::class,'showSubmit'])->name('show.image.submit');
Route::get('/show/dashboard',[ImageController::class,'dashboard'])->name('show.dashboard');
Route::get('/mail',[ImageController::class,'mail']);
Route::post('/mail',[ImageController::class,'mailSubmit']);
Route::get('/download/{p_image}',[ImageController::class,'download'])->name('download');
Route::get('/downloadPDF',[ImageController::class,'downloadPdf'])->name('download.pdf');

Route::get('/book',[BookController::class,'book'])->name('book');

Route::post('/book',[BookController::class,'bookSubmit'])->name('book.submit');
Route::get('/book/show',[BookController::class,'bookShow'])->name('book.show');

Route::get('/item',[AddItemsController::class,'item'])->name('item');
Route::post('/item',[AddItemsController::class,'itemSubmit'])->name('item.submit');