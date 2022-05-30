<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardEngineerController;
use App\Http\Controllers\DashboardGLController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\DRFController;
use App\Http\Controllers\IVSPController;
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
Route::post('/dashboarduser/storeivsp', [DashboardUserController::class, 'storeIVSP'])->name('dashboarduser.storeIVSP')->middleware('user');
Route::get('/dashboarduser/formdrf', [DashboardUserController::class, 'createDRF'])->name('dashboarduser.formDRF')->middleware('user');
Route::get('/dashboarduser/formivsp', [DashboardUserController::class, 'createIVSP'])->name('dashboarduser.formIVSP')->middleware('user');
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware('user');
// END AUTH USER

// AUTH GL
Route::get('/logingl', [LoginController::class, 'indexGL'])->name('logingl.index')->middleware('guest');
// END AUTH GL


// DASHBOARD ADMIN
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin.index')->middleware('admin');
Route::get('/dashboardadmin/history', [DashboardAdminController::class, 'history'])->name('dashboardadmin.history')->middleware('admin');
Route::post('/dashboardadmin/drfprocessadmin/{id}', [DashboardAdminController::class, 'drfProcessAdmin'])->name('dashboardadmin.drfProcessAdmin')->middleware('admin');
Route::post('/dashboardadmin/ivspprocessadmin/{id}', [DashboardAdminController::class, 'ivspProcessAdmin'])->name('dashboardadmin.ivspProcessAdmin')->middleware('admin');
Route::get('/dashboardadmin/drf/sop/{id}', [DashboardAdminController::class, 'drfSOPAdmin'])->name('drf.sopAdmin')->middleware('admin');
Route::get('/dashboardadmin/ivsp/sop/{id}', [DashboardAdminController::class, 'ivspSOPAdmin'])->name('ivsp.sopAdmin')->middleware('admin');

// DRF ADMIN
Route::get('/dashboardadmin/historydrf', [DRFController::class, 'history'])->name('drf.history')->middleware('admin');
Route::resource('/dashboardadmin/drf', DRFController::class)->middleware('admin')->except(['create', 'store','index']);


//IVSP ADMIN
Route::get('/dashboardadmin/historyivsp', [IVSPController::class, 'history'])->name('ivsp.history')->middleware('admin');
Route::resource('/dashboardadmin/ivsp', IVSPController::class)->middleware('admin')->except(['edit','index','update','create']);

// END DASHBOARD ADMIN

// DASHBOARD GL
Route::get('/dashboardgl', [DashboardGLController::class, 'index'])->name('dashboardgl.index')->middleware('GL');
Route::get('/dashboardgl/history', [DashboardGLController::class, 'history'])->name('dashboardgl.history')->middleware('GL');
Route::get('/dashboardgl/drf/sop/{id}', [DashboardGLController::class, 'drfSOPGL'])->name('drf.sopGL')->middleware('GL');
Route::post('/dashboardgl/drfprocessgl/{id}', [DashboardGLController::class, 'drfAckGL'])->name('dashboardgl.drfProcessGL')->middleware('GL');

Route::get('/dashboardgl/historydrf', [DRFController::class, 'history'])->name('drf.history')->middleware('GL');
Route::get('/dashboardgl/historyivsp', [IVSPController::class, 'history'])->name('ivsp.history')->middleware('GL');
// END DASHBOARD GL

// DASHBOARD ENGINEER
Route::get('/dashboardengineer', [DashboardEngineerController::class, 'index'])->name('dashboardengineer.index')->middleware('engineer');
Route::get('/dashboardengineer/history', [DashboardEngineerController::class, 'history'])->name('dashboardengineer.history')->middleware('engineer');
// END DASHBOARD ENGINEER


// DASHBOARD USER
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware('auth');
// END DASHBOARD USER

// Donwload Route
Route::post('/download', [DownloadController::class, 'index'])->name('download.index')->middleware('auth');
// END Donwload Route
