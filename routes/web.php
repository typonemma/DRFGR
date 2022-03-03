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

// AUTH UMUM
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate')->middleware('guest');
// END AUTH UMUM

// AUTH ADMIN
Route::get('/loginadmin', [LoginController::class, 'index'])->name('login.index')->middleware('guest');

// END AUTH ADMIN

// AUTH USER
Route::get('/loginuser', [LoginController::class, 'indexUser'])->name('loginuser.index')->middleware('guest');
Route::get('/registeruser', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/registeruser', [RegisterController::class, 'store'])->name('register.store')->middleware('guest');
Route::post('/dashboarduser/storedrf', [DashboardUserController::class, 'storeDRF'])->name('dashboarduser.storeDRF')->middleware('user');
Route::post('/dashboarduser/storegr', [DashboardUserController::class, 'storeGR'])->name('dashboarduser.storeGR')->middleware('user');
Route::get('/dashboarduser/formdrf', [DashboardUserController::class, 'createDRF'])->name('dashboarduser.formDRF')->middleware('user');
Route::get('/dashboarduser/formgr', [DashboardUserController::class, 'createGR'])->name('dashboarduser.formGR')->middleware('user');
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware('user');
// END AUTH USER

// AUTH GL
Route::get('/logingl', [LoginController::class, 'indexGL'])->name('logingl.index')->middleware('guest');
// END AUTH GL


// DASHBOARD ADMIN
Route::get('/dashboardadmin/formdrf', [DashboardAdminController::class, 'createDRF'])->name('dashboardadmin.createDRF')->middleware('admin');
Route::get('/dashboardadmin/formgr', [DashboardAdminController::class, 'createGR'])->name('dashboardadmin.createGR')->middleware('admin');
Route::get('/dashboardadmin/editdrf/{id}', [DashboardAdminController::class, 'editDRF'])->name('dashboardadmin.editDRF')->middleware('admin');
Route::get('/dashboardadmin/editgr/{id}', [DashboardAdminController::class, 'editGR'])->name('dashboardadmin.editGR')->middleware('admin');
Route::get('/dashboardadmin/showdrf', [DashboardAdminController::class, 'showDRF'])->name('dashboardadmin.showDRF')->middleware('admin');
Route::get('/dashboardadmin/showgr', [DashboardAdminController::class, 'showGR'])->name('dashboardadmin.showGR')->middleware('admin');
Route::put('/dashboardadmin/updatedrf/{id}', [DashboardAdminController::class, 'updateDRF'])->name('dashboardadmin.updateDRF')->middleware('admin');
Route::put('/dashboardadmin/updategr/{id}', [DashboardAdminController::class, 'updateGR'])->name('dashboardadmin.updateGR')->middleware('admin');
Route::delete('/dashboardadmin/destroydrf/{id}', [DashboardAdminController::class, 'destroyDRF'])->name('dashboardadmin.destroyDRF')->middleware('admin');
Route::delete('/dashboardadmin/destroygr/{id}', [DashboardAdminController::class, 'destroyGR'])->name('dashboardadmin.destroyGR')->middleware('admin');
Route::get('/dashboardadmin/history', [DashboardAdminController::class, 'history'])->name('dashboardadmin.history')->where('month', '[0-9]+')->where('year', '[0-9]+')->middleware('admin');
Route::resource('dashboardadmin', DashboardAdminController::class)->only('index')->middleware('admin');
// END DASHBOARD ADMIN

// DASHBOARD USER
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware('auth');
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin.index')->middleware('auth');
// END DASHBOARD USER
