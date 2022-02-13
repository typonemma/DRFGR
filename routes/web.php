<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUserController;
use Illuminate\Support\Facades\Route;
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


// AUTH
Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
// END AUTH

// DASHBOARD ADMIN
Route::get('/history/{month?}/{year?}', [DashboardAdminController::class, 'history'])->name('dashboardadmin.history')->where('month', '[0-9]+')->where('year', '[0-9]+');
Route::get('/dashboardadmin/formdrf', [DashboardAdminController::class, 'createDRF'])->name('dashboardadmin.createDRF');
Route::get('/dashboardadmin/formgr', [DashboardAdminController::class, 'createDRF'])->name('dashboardadmin.createDRF');
Route::post('/dashboardadmin/storedrf', [DashboardAdminController::class, 'storeDRF'])->name('dashboardadmin.storeDRF');
Route::post('/dashboardadmin/storegr', [DashboardAdminController::class, 'storeGR'])->name('dashboardadmin.storeGR');
Route::get('/dashboardadmin/showdrf/{id}', [DashboardAdminController::class, 'showDRF'])->name('dashboardadmin.showDRF');
Route::get('/dashboardadmin/showgr/{id}', [DashboardAdminController::class, 'showGR'])->name('dashboardadmin.showGR');
Route::get('/dashboardadmin/editdrf/{id}', [DashboardAdminController::class, 'editDRF'])->name('dashboardadmin.editDRF');
Route::get('/dashboardadmin/editgr/{id}', [DashboardAdminController::class, 'editGR'])->name('dashboardadmin.editGR');
Route::put('/dashboardadmin/updatedrf/{id}', [DashboardAdminController::class, 'updateDRF'])->name('dashboardadmin.updateDRF');
Route::put('/dashboardadmin/updategr/{id}', [DashboardAdminController::class, 'updateGR'])->name('dashboardadmin.updateGR');
Route::delete('/dashboardadmin/destroydrf/{id}', [DashboardAdminController::class, 'destroyDRF'])->name('dashboardadmin.destroyDRF');
Route::delete('/dashboardadmin/destroygr/{id}', [DashboardAdminController::class, 'destroyGR'])->name('dashboardadmin.destroyGR');
Route::resource('dashboardadmin', DashboardAdminController::class)->only('index');
// END DASHBOARD ADMIN

// DASHBOARD USER
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware('auth');
// END DASHBOARD USER