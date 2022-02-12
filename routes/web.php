<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DRFController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegisterController;

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



Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/drf/status/{id}', [DRFController::class, 'updateStatus'])->name('drf.status');
Route::resource('drf', DRFController::class);
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
