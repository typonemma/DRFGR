<?php

use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardEngineerController;
use App\Http\Controllers\DashboardGLController;
use App\Http\Controllers\DashboardManagerController;
use App\Http\Controllers\DashboardQCController;
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

// DASHBOARD SUPERADMIN
Route::resource('/dashboardadmin/admin', AdminController::class)->except(['edit','update'])->middleware('superAdmin');
// END DASHBOARD SUPERADMIN


// DASHBOARD ADMIN
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin.index')->middleware('admin');
Route::get('/dashboardadmin/history', [DashboardAdminController::class, 'history'])->name('dashboardadmin.history')->middleware('admin');
Route::post('/dashboardadmin/drfprocessadmin/{id}', [DashboardAdminController::class, 'drfProcessAdmin'])->name('dashboardadmin.drfProcessAdmin')->middleware('admin');
Route::post('/dashboardadmin/ivspprocessadmin/{id}', [DashboardAdminController::class, 'ivspProcessAdmin'])->name('dashboardadmin.ivspProcessAdmin')->middleware('admin');
Route::get('/dashboardadmin/drf/sop/{id}', [DashboardAdminController::class, 'drfSOPAdmin'])->name('drf.sopAdmin')->middleware('admin');
Route::get('/dashboardadmin/ivsp/sop/{id}', [DashboardAdminController::class, 'ivspSOPAdmin'])->name('ivsp.sopAdmin')->middleware('admin');

// DRF ADMIN
Route::get('/historydrf', [DRFController::class, 'history'])->name('drf.history')->middleware('allStakeholder');
Route::resource('/dashboardadmin/drf', DRFController::class)->middleware('admin')->except(['create', 'store','index']);


//IVSP ADMIN
Route::get('/historyivsp', [IVSPController::class, 'history'])->name('ivsp.history')->middleware('allStakeholder');
Route::resource('/dashboardadmin/ivsp', IVSPController::class)->middleware('admin')->except(['edit','index','update','create']);

// GL CRUD
Route::resource('/dashboardadmin/gl', GLController::class)->middleware('admin')->except(['edit','update']);
// END GL CRUD
// Engineer CRUD
Route::resource('/dashboardadmin/engineer', EngineerController::class)->middleware('admin')->except(['edit','update']);
// END Engineer CRUD
// Manager CRUD
Route::resource('/dashboardadmin/manager', ManagerController::class)->middleware('admin')->except(['edit','update']);
// END Manager CRUD
// QC CRUD
Route::resource('/dashboardadmin/qc', QCController::class)->middleware('admin')->except(['edit','update']);
// END QC CRUD

// END DASHBOARD ADMIN

// DASHBOARD GL
Route::get('/dashboardgl', [DashboardGLController::class, 'index'])->name('dashboardgl.index')->middleware('GL');
Route::get('/dashboardgl/history', [DashboardGLController::class, 'history'])->name('dashboardgl.history')->middleware('GL');
Route::get('/dashboardgl/drf/sopackgl/{id}', [DashboardGLController::class, 'drfSOPAckGL'])->name('drf.sopAckGL')->middleware('GL');
Route::get('/dashboardgl/drf/soprevgl/{id}', [DashboardGLController::class, 'drfSOPReviewGL'])->name('drf.sopReviewGL')->middleware('GL');
Route::get('/dashboardgl/ivsp/sopackgl/{id}', [DashboardGLController::class, 'ivspSOPAckGL'])->name('ivsp.sopAckGL')->middleware('GL');
Route::get('/dashboardgl/ivsp/soprevgl/{id}', [DashboardGLController::class, 'ivspSOPReviewGL'])->name('ivsp.sopReviewGL')->middleware('GL');
Route::post('/dashboardgl/drfackgl/{id}', [DashboardGLController::class, 'drfAckGL'])->name('dashboardgl.drfACKGL')->middleware('GL');
Route::post('/dashboardgl/ivspackgl/{id}', [DashboardGLController::class, 'ivspAckGL'])->name('dashboardgl.ivspACKGL')->middleware('GL');
Route::post('/dashboardgl/drfreviewgl/{id}', [DashboardGLController::class, 'drfReviewGL'])->name('dashboardgl.drfReviewGL')->middleware('GL');
Route::post('/dashboardgl/ivspreviewgl/{id}', [DashboardGLController::class, 'ivspReviewGL'])->name('dashboardgl.ivspReviewGL')->middleware('GL');
// END DASHBOARD GL

// DASHBOARD ENGINEER
Route::get('/dashboardengineer', [DashboardEngineerController::class, 'index'])->name('dashboardengineer.index')->middleware('engineer');
Route::get('/dashboardengineer/history', [DashboardEngineerController::class, 'history'])->name('dashboardengineer.history')->middleware('engineer');
Route::get('/dashboardengineer/drf/sop/{id}', [DashboardEngineerController::class, 'drfSOPEngineer'])->name('drf.sopEngineer')->middleware('engineer');
Route::get('/dashboardengineer/ivsp/sop/{id}', [DashboardEngineerController::class, 'ivspSOPEngineer'])->name('ivsp.sopEngineer')->middleware('engineer');
Route::post('/dashboardengineer/drfdoengineer/{id}', [DashboardEngineerController::class, 'drfDoByEngineer'])->name('dashboardengineer.drfDoByEngineer')->middleware('engineer');
Route::post('/dashboardengineer/ivspdoengineer/{id}', [DashboardEngineerController::class, 'ivspDoByEngineer'])->name('dashboardengineer.ivspDoByEngineer')->middleware('engineer');
// END DASHBOARD ENGINEER

// DASHBOARD QC
Route::get('/dashboardqc', [DashboardQCController::class, 'index'])->name('dashboardqc.index')->middleware('QC');
Route::get('/dashboardqc/history', [DashboardQCController::class, 'history'])->name('dashboardqc.history')->middleware('QC');
Route::get('/dashboardqc/drf/sop/{id}', [DashboardQCController::class, 'drfSOPQC'])->name('drf.sopQC')->middleware('QC');
Route::post('dashboardqc/drfrevqc/{id}', [DashboardQCController::class, 'drfReviewQC'])->name('dashboardqc.drfReviewQC')->middleware('QC');
// END DASHBOARD QC

// DASHBOARD MANAGER
Route::get('/dashboardmanager', [DashboardManagerController::class, 'index'])->name('dashboardmanager.index')->middleware('manager');
Route::get('/dashboardmanager/history', [DashboardManagerController::class, 'history'])->name('dashboardmanager.history')->middleware('manager');
Route::get('/dashboardmanager/ivsp/sopreviewmanager/{id}', [DashboardManagerController::class, 'ivspSOPReviewManager'])->name('dashhboardmanager.sopReviewManager')->middleware('manager');
Route::get('/dashboardmanager/ivsp/sopapprovemanager/{id}', [DashboardManagerController::class, 'ivspSOPApproveManager'])->name('dashhboardmanager.sopApproveManager')->middleware('manager');
Route::post('/dashboardmanager/ivsp/sopreviewmanager/{id}', [DashboardManagerController::class, 'ivspReviewByManager'])->name('dashhboardmanager.ivspReviewByManager')->middleware('manager');
Route::post('/dashboardmanager/ivsp/sopapprovemanager/{id}', [DashboardManagerController::class, 'ivspApproveByManager'])->name('dashhboardmanager.ivspApproveByManager')->middleware('manager');
// END DASHBOARD MANAGER


// DASHBOARD USER
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware('auth');
// END DASHBOARD USER

// Donwload Route
Route::post('/download', [DownloadController::class, 'index'])->name('download.index')->middleware('auth');
// END Donwload Route
