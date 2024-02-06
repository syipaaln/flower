<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AlbumController;
use App\http\Controllers\FotoController;
use App\http\Controllers\KomentarFotoController;
use App\http\Controllers\LikeFotoController;
use App\http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('album', AlbumController::class);
Route::resource('foto', FotoController::class);
Route::resource('komentarfoto', KomentarFotoController::class);
Route::resource('likefoto', LikeFotoController::class);
Route::resource('user', UserController::class);
