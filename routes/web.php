<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DRFController;
use App\Http\Controllers\IVSPController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardGLController;
use App\Http\Controllers\DashboardQCController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardManagerController;
use App\Http\Controllers\DashboardEngineerController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes(['verify' => true]);

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
Route::post('/dashboarduser/storedrf', [DashboardUserController::class, 'storeDRF'])->name('dashboarduser.storeDRF')->middleware(['user','verified']);
Route::post('/dashboarduser/storeivsp', [DashboardUserController::class, 'storeIVSP'])->name('dashboarduser.storeIVSP')->middleware(['user', 'verified']);
Route::get('/dashboarduser/formdrf', [DashboardUserController::class, 'createDRF'])->name('dashboarduser.formDRF')->middleware([ 'user', 'verified']);
Route::get('/dashboarduser/formivsp', [DashboardUserController::class, 'createIVSP'])->name('dashboarduser.formIVSP')->middleware([ 'user', 'verified']);
Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware(['user', 'verified']);
// END AUTH USER

// AUTH GL
Route::get('/logingl', [LoginController::class, 'indexGL'])->name('logingl.index')->middleware('guest');
// END AUTH GL

// DASHBOARD SUPERADMIN
Route::resource('/dashboardadmin/admin', AdminController::class)->except(['edit','update'])->middleware('superAdmin');
// END DASHBOARD SUPERADMIN


// DASHBOARD ADMIN
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin.index')->middleware(['admin', 'verified']);
Route::get('/dashboardadmin/history', [DashboardAdminController::class, 'history'])->name('dashboardadmin.history')->middleware(['admin', 'verified']);
Route::post('/dashboardadmin/drfprocessadmin/{id}', [DashboardAdminController::class, 'drfProcessAdmin'])->name('dashboardadmin.drfProcessAdmin')->middleware(['admin', 'verified']);
Route::post('/dashboardadmin/ivspprocessadmin/{id}', [DashboardAdminController::class, 'ivspProcessAdmin'])->name('dashboardadmin.ivspProcessAdmin')->middleware(['admin', 'verified']);
Route::get('/dashboardadmin/drf/sop/{id}', [DashboardAdminController::class, 'drfSOPAdmin'])->name('drf.sopAdmin')->middleware(['admin', 'verified']);
Route::get('/dashboardadmin/ivsp/sop/{id}', [DashboardAdminController::class, 'ivspSOPAdmin'])->name('ivsp.sopAdmin')->middleware(['admin', 'verified']);

// DRF ADMIN
Route::get('/historydrf', [DRFController::class, 'history'])->name('drf.history')->middleware(['allStakeholder', 'verified']);
Route::resource('/dashboardadmin/drf', DRFController::class)->middleware(['admin', 'verified'])->except(['create', 'store','index']);


//IVSP ADMIN
Route::get('/historyivsp', [IVSPController::class, 'history'])->name('ivsp.history')->middleware(['allStakeholder', 'verified']);
Route::resource('/dashboardadmin/ivsp', IVSPController::class)->middleware(['admin', 'verified'])->except(['edit','index','update','create']);

// GL CRUD
Route::resource('/dashboardadmin/gl', GLController::class)->middleware(['admin', 'verified'])->except(['edit','update']);
// END GL CRUD
// Engineer CRUD
Route::resource('/dashboardadmin/engineer', EngineerController::class)->middleware(['admin', 'verified'])->except(['edit','update']);
// END Engineer CRUD
// Manager CRUD
Route::resource('/dashboardadmin/manager', ManagerController::class)->middleware(['admin', 'verified'])->except(['edit','update']);
// END Manager CRUD
// QC CRUD
Route::resource('/dashboardadmin/qc', QCController::class)->middleware(['admin', 'verified'])->except(['edit','update']);
// END QC CRUD

// END DASHBOARD ADMIN

// DASHBOARD GL
Route::get('/dashboardgl', [DashboardGLController::class, 'index'])->name('dashboardgl.index')->middleware(['GL', 'verified']);
Route::get('/dashboardgl/history', [DashboardGLController::class, 'history'])->name('dashboardgl.history')->middleware(['GL', 'verified']);
Route::get('/dashboardgl/drf/sopackgl/{id}', [DashboardGLController::class, 'drfSOPAckGL'])->name('drf.sopAckGL')->middleware(['GL', 'verified']);
Route::get('/dashboardgl/drf/soprevgl/{id}', [DashboardGLController::class, 'drfSOPReviewGL'])->name('drf.sopReviewGL')->middleware(['GL', 'verified']);
Route::get('/dashboardgl/ivsp/sopackgl/{id}', [DashboardGLController::class, 'ivspSOPAckGL'])->name('ivsp.sopAckGL')->middleware(['GL', 'verified']);
Route::get('/dashboardgl/ivsp/soprevgl/{id}', [DashboardGLController::class, 'ivspSOPReviewGL'])->name('ivsp.sopReviewGL')->middleware(['GL', 'verified']);
Route::post('/dashboardgl/drfackgl/{id}', [DashboardGLController::class, 'drfAckGL'])->name('dashboardgl.drfACKGL')->middleware(['GL', 'verified']);
Route::post('/dashboardgl/ivspackgl/{id}', [DashboardGLController::class, 'ivspAckGL'])->name('dashboardgl.ivspACKGL')->middleware(['GL', 'verified']);
Route::post('/dashboardgl/drfreviewgl/{id}', [DashboardGLController::class, 'drfReviewGL'])->name('dashboardgl.drfReviewGL')->middleware(['GL', 'verified']);
Route::post('/dashboardgl/ivspreviewgl/{id}', [DashboardGLController::class, 'ivspReviewGL'])->name('dashboardgl.ivspReviewGL')->middleware(['GL', 'verified']);
// END DASHBOARD GL

// DASHBOARD ENGINEER
Route::get('/dashboardengineer', [DashboardEngineerController::class, 'index'])->name('dashboardengineer.index')->middleware(['engineer', 'verified']);
Route::get('/dashboardengineer/history', [DashboardEngineerController::class, 'history'])->name('dashboardengineer.history')->middleware(['engineer', 'verified']);
Route::get('/dashboardengineer/drf/sop/{id}', [DashboardEngineerController::class, 'drfSOPEngineer'])->name('drf.sopEngineer')->middleware(['engineer', 'verified']);
Route::get('/dashboardengineer/ivsp/sop/{id}', [DashboardEngineerController::class, 'ivspSOPEngineer'])->name('ivsp.sopEngineer')->middleware(['engineer', 'verified']);
Route::post('/dashboardengineer/drfdoengineer/{id}', [DashboardEngineerController::class, 'drfDoByEngineer'])->name('dashboardengineer.drfDoByEngineer')->middleware(['engineer', 'verified']);
Route::post('/dashboardengineer/ivspdoengineer/{id}', [DashboardEngineerController::class, 'ivspDoByEngineer'])->name('dashboardengineer.ivspDoByEngineer')->middleware(['engineer', 'verified']);
// END DASHBOARD ENGINEER

// DASHBOARD QC
Route::get('/dashboardqc', [DashboardQCController::class, 'index'])->name('dashboardqc.index')->middleware(['QC', 'verified']);
Route::get('/dashboardqc/history', [DashboardQCController::class, 'history'])->name('dashboardqc.history')->middleware(['QC', 'verified']);
Route::get('/dashboardqc/drf/sop/{id}', [DashboardQCController::class, 'drfSOPQC'])->name('drf.sopQC')->middleware(['QC', 'verified']);
Route::post('dashboardqc/drfrevqc/{id}', [DashboardQCController::class, 'drfReviewQC'])->name('dashboardqc.drfReviewQC')->middleware(['QC', 'verified']);
// END DASHBOARD QC

// DASHBOARD MANAGER
Route::get('/dashboardmanager', [DashboardManagerController::class, 'index'])->name('dashboardmanager.index')->middleware(['manager', 'verified']);
Route::get('/dashboardmanager/history', [DashboardManagerController::class, 'history'])->name('dashboardmanager.history')->middleware(['manager', 'verified']);
Route::get('/dashboardmanager/ivsp/sopreviewmanager/{id}', [DashboardManagerController::class, 'ivspSOPReviewManager'])->name('dashhboardmanager.sopReviewManager')->middleware(['manager', 'verified']);
Route::get('/dashboardmanager/ivsp/sopapprovemanager/{id}', [DashboardManagerController::class, 'ivspSOPApproveManager'])->name('dashhboardmanager.sopApproveManager')->middleware(['manager', 'verified']);
Route::post('/dashboardmanager/ivsp/sopreviewmanager/{id}', [DashboardManagerController::class, 'ivspReviewByManager'])->name('dashhboardmanager.ivspReviewByManager')->middleware(['manager', 'verified']);
Route::post('/dashboardmanager/ivsp/sopapprovemanager/{id}', [DashboardManagerController::class, 'ivspApproveByManager'])->name('dashhboardmanager.ivspApproveByManager')->middleware(['manager', 'verified']);
// END DASHBOARD MANAGER

// Donwload Route
Route::post('/download', [DownloadController::class, 'index'])->name('download.index')->middleware(['auth', 'verified']);
// END Donwload Route



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
