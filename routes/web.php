<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GLController;
use App\Http\Controllers\QCController;
use App\Http\Controllers\DRFController;
use App\Http\Controllers\IVSPController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\EngineerController;
use App\Http\Controllers\DashboardGLController;
use App\Http\Controllers\DashboardQCController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DRFSuperAdminController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\IVSPSuperAdminController;
use App\Http\Controllers\DashboardManagerController;
use App\Http\Controllers\DashboardEngineerController;
use App\Http\Controllers\DashboardSuperAdminController;
use App\Http\Controllers\DRFAdminController;
use App\Http\Controllers\IVSPAdminController;


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


// DASHBOARD USER
Route::post('/dashboard/user/storedrf', [DashboardUserController::class, 'storeDRF'])->name('dashboarduser.storeDRF')->middleware(['user','verified']);
Route::post('/dashboard/user/storeivsp', [DashboardUserController::class, 'storeIVSP'])->name('dashboarduser.storeIVSP')->middleware(['user', 'verified']);
Route::get('/dashboard/user/formdrf', [DashboardUserController::class, 'createDRF'])->name('dashboarduser.formDRF')->middleware([ 'user', 'verified']);
Route::get('/dashboard/user/formivsp', [DashboardUserController::class, 'createIVSP'])->name('dashboarduser.formIVSP')->middleware([ 'user', 'verified']);
Route::get('/dashboard/user', [DashboardUserController::class, 'index'])->name('dashboarduser.index')->middleware(['user', 'verified']);
// DASHBOARD USER


// DASHBOARD SUPERADMIN
// Admin CRUD
Route::resource('/dashboard/superadmin/admin', AdminController::class)->middleware(['superAdmin','verified'])->except(['edit','update']);
// END Admin CRUD
// GL CRUD
Route::resource('/dashboard/superadmin/gl', GLController::class)->middleware(['superAdmin', 'verified'])->except(['edit','update']);
// END GL CRUD
// Engineer CRUD
Route::resource('/dashboard/superadmin/engineer', EngineerController::class)->middleware(['superAdmin', 'verified'])->except(['edit','update']);
// END Engineer CRUD
// Manager CRUD
Route::resource('/dashboard/superadmin/manager', ManagerController::class)->middleware(['superAdmin', 'verified'])->except(['edit','update']);
// END Manager CRUD
// QC CRUD
Route::resource('/dashboard/superadmin/qc', QCController::class)->middleware(['superAdmin', 'verified'])->except(['edit','update']);
// END QC CRUD

Route::get('/dashboard/superadmin', [DashboardSuperAdminController::class, 'index'])->name('dashboardsuperadmin.index')->middleware(['superAdmin', 'verified']);
Route::get('/dashboard/superadmin/history', [DashboardSuperAdminController::class, 'history'])->name('dashboardsuperadmin.history')->middleware(['superAdmin', 'verified']);
Route::post('/dashboard/superadmin/drfprocessadmin/{id}', [DashboardSuperAdminController::class, 'drfProcessSuperAdmin'])->name('dashboardsuperadmin.drfProcessAdmin')->middleware(['superAdmin', 'verified']);
Route::post('/dashboard/superadmin/ivspprocessadmin/{id}', [DashboardSuperAdminController::class, 'ivspProcessSuperAdmin'])->name('dashboardsuperadmin.ivspProcessAdmin')->middleware(['superAdmin', 'verified']);
Route::get('/dashboard/superadmin/drf/sop/{id}', [DashboardSuperAdminController::class, 'drfSOPSuperAdmin'])->name('drf.sopSuperAdmin')->middleware(['superAdmin', 'verified']);
Route::get('/dashboard/superadmin/ivsp/sop/{id}', [DashboardSuperAdminController::class, 'ivspSOPSuperAdmin'])->name('ivsp.sopSuperAdmin')->middleware(['superAdmin', 'verified']);

// DRF SUPERADMIN
Route::get('/dashboard/superadmin/historydrf', [DRFSuperAdminController::class, 'history'])->name('drfsuperadmin.history')->middleware(['superAdmin', 'verified']);
Route::resource('/dashboard/superadmin/drf', DRFSuperAdminController::class, ['as' => 'superAdmin'])->except(['create', 'store','index'])->middleware(['superAdmin', 'verified']);


//IVSP SUPERADMIN
Route::get('/dashboard/superadmin/historyivsp', [IVSPSuperAdminController::class, 'history'])->name('ivspsuperadmin.history')->middleware(['superAdmin', 'verified']);
Route::resource('/dashboard/superadmin/ivsp', IVSPSuperAdminController::class, ['as' => 'superAdmin'])->middleware(['superAdmin', 'verified'])->except(['edit','index','update','create']);
// END DASHBOARD SUPERADMIN

// DASHBOARD ADMIN
Route::get('/dashboard/admin', [DashboardAdminController::class, 'index'])->name('dashboardadmin.index')->middleware(['admin', 'verified']);
Route::get('/dashboard/admin/history', [DashboardAdminController::class, 'history'])->name('dashboardadmin.history')->middleware(['admin', 'verified']);
Route::post('/dashboard/admin/drfprocessadmin/{id}', [DashboardAdminController::class, 'drfProcessAdmin'])->name('dashboardadmin.drfProcessAdmin')->middleware(['admin', 'verified']);
Route::post('/dashboard/admin/ivspprocessadmin/{id}', [DashboardAdminController::class, 'ivspProcessAdmin'])->name('dashboardadmin.ivspProcessAdmin')->middleware(['admin', 'verified']);
Route::get('/dashboard/admin/drf/sop/{id}', [DashboardAdminController::class, 'drfSOPAdmin'])->name('drf.sopAdmin')->middleware(['admin', 'verified']);
Route::get('/dashboard/admin/ivsp/sop/{id}', [DashboardAdminController::class, 'ivspSOPAdmin'])->name('ivsp.sopAdmin')->middleware(['admin', 'verified']);

// DRF ADMIN
Route::get('/dashboard/admin/historydrf', [DRFAdminController::class, 'historyAdmin'])->name('drf.historyadmin')->middleware(['admin', 'verified']);
//Route::get('/dashboard/admin/historydrf', [DRFAdminController::class, 'destroy'])->name('drf.destroyadmin')->middleware(['admin', 'verified']);
Route::resource('/dashboard/admin/drf', DRFAdminController::class, ['as' => 'admin'])->middleware(['admin', 'verified'])->except(['create', 'store','index', 'show']);
Route::get('/dashboard/admin/drf/{id}', [DRFAdminController::class, 'show'])->name('admin.drf.show')->middleware(['admin', 'verified']);
Route::delete('/dashboard/admin/drf/destory/{id}', [DRFAdminController::class, 'destroy'])->name('admin.drf.delete')->middleware(['admin', 'verified']);

//IVSP ADMIN
Route::get('/dashboard/admin/historyivsp', [IVSPController::class, 'historyAdmin'])->name('ivsp.historyadmin')->middleware(['admin', 'verified']);
Route::resource('/dashboard/admin/ivsp', IVSPController::class,  ['as' => 'admin'])->middleware(['admin', 'verified'])->except(['edit','index','update','create', 'show']);
Route::get('/dashboard/admin/ivsp/{id}', [IVSPController::class, 'showAdmin'])->name('admin.ivsp.show')->middleware(['admin', 'verified']);
Route::delete('/dashboard/admin/ivsp/destory/{id}', [IVSPController::class, 'destroy'])->name('admin.ivsp.delete')->middleware(['admin', 'verified']);

// DASHBOARD GL
Route::get('/dashboard/gl', [DashboardGLController::class, 'index'])->name('dashboardgl.index')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/history', [DashboardGLController::class, 'history'])->name('dashboardgl.history')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/drf/sopackgl/{id}', [DashboardGLController::class, 'drfSOPAckGL'])->name('drf.sopAckGL')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/drf/soprevgl/{id}', [DashboardGLController::class, 'drfSOPReviewGL'])->name('drf.sopReviewGL')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/ivsp/sopackgl/{id}', [DashboardGLController::class, 'ivspSOPAckGL'])->name('ivsp.sopAckGL')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/ivsp/soprevgl/{id}', [DashboardGLController::class, 'ivspSOPReviewGL'])->name('ivsp.sopReviewGL')->middleware(['GL', 'verified']);
Route::post('/dashboard/gl/drfackgl/{id}', [DashboardGLController::class, 'drfAckGL'])->name('dashboardgl.drfACKGL')->middleware(['GL', 'verified']);
Route::post('/dashboard/gl/ivspackgl/{id}', [DashboardGLController::class, 'ivspAckGL'])->name('dashboardgl.ivspACKGL')->middleware(['GL', 'verified']);
Route::post('/dashboard/gl/drfreviewgl/{id}', [DashboardGLController::class, 'drfReviewGL'])->name('dashboardgl.drfReviewGL')->middleware(['GL', 'verified']);
Route::post('/dashboard/gl/ivspreviewgl/{id}', [DashboardGLController::class, 'ivspReviewGL'])->name('dashboardgl.ivspReviewGL')->middleware(['GL', 'verified']);

Route::get('/dashboard/gl/historydrf', [DashboardGLController::class, 'historyGL'])->name('drf.historygl')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/historyivsp', [IVSPController::class, 'historyGL'])->name('ivsp.historygl')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/drf/{id}', [DRFAdminController::class, 'showAdmin'])->name('gl.drf.show')->middleware(['GL', 'verified']);
Route::get('/dashboard/gl/ivsp/{id}', [DRFAdminController::class, 'showAdmin'])->name('gl.ivsp.show')->middleware(['GL', 'verified']);
// END DASHBOARD GL

// DASHBOARD ENGINEER
Route::get('/dashboard/engineer', [DashboardEngineerController::class, 'index'])->name('dashboardengineer.index')->middleware(['engineer', 'verified']);
Route::get('/dashboard/engineer/history', [DashboardEngineerController::class, 'history'])->name('dashboardengineer.history')->middleware(['engineer', 'verified']);
Route::get('/dashboard/engineer/drf/sop/{id}', [DashboardEngineerController::class, 'drfSOPEngineer'])->name('drf.sopEngineer')->middleware(['engineer', 'verified']);
Route::get('/dashboard/engineer/ivsp/sop/{id}', [DashboardEngineerController::class, 'ivspSOPEngineer'])->name('ivsp.sopEngineer')->middleware(['engineer', 'verified']);
Route::post('/dashboard/engineer/drfdoengineer/{id}', [DashboardEngineerController::class, 'drfDoByEngineer'])->name('dashboardengineer.drfDoByEngineer')->middleware(['engineer', 'verified']);

// END DASHBOARD ENGINEER

// DASHBOARD QC
Route::get('/dashboard/qc', [DashboardQCController::class, 'index'])->name('dashboardqc.index')->middleware(['QC', 'verified']);
Route::get('/dashboard/qc/history', [DashboardQCController::class, 'history'])->name('dashboardqc.history')->middleware(['QC', 'verified']);
Route::get('/dashboard/qc/drf/sop/{id}', [DashboardQCController::class, 'drfSOPQC'])->name('drf.sopQC')->middleware(['QC', 'verified']);
Route::post('/dashboard/qc/drfrevqc/{id}', [DashboardQCController::class, 'drfReviewQC'])->name('dashboardqc.drfReviewQC')->middleware(['QC', 'verified']);
// END DASHBOARD QC

// DASHBOARD MANAGER
Route::get('/dashboard/manager', [DashboardManagerController::class, 'index'])->name('dashboardmanager.index')->middleware(['manager', 'verified']);
Route::get('/dashboard/manager/history', [DashboardManagerController::class, 'history'])->name('dashboardmanager.history')->middleware(['manager', 'verified']);
Route::get('/dashboard/manager/ivsp/sopreviewmanager/{id}', [DashboardManagerController::class, 'ivspSOPReviewManager'])->name('dashhboardmanager.sopReviewManager')->middleware(['manager', 'verified']);
Route::get('/dashboard/manager/ivsp/sopapprovemanager/{id}', [DashboardManagerController::class, 'ivspSOPApproveManager'])->name('dashhboardmanager.sopApproveManager')->middleware(['manager', 'verified']);
Route::post('/dashboard/manager/ivsp/sopreviewmanager/{id}', [DashboardManagerController::class, 'ivspReviewByManager'])->name('dashhboardmanager.ivspReviewByManager')->middleware(['manager', 'verified']);
Route::post('/dashboard/manager/ivsp/sopapprovemanager/{id}', [DashboardManagerController::class, 'ivspApproveByManager'])->name('dashhboardmanager.ivspApproveByManager')->middleware(['manager', 'verified']);
// END DASHBOARD MANAGER

// Donwload Route
Route::post('/download', [DownloadController::class, 'index'])->name('download.index')->middleware(['auth', 'verified']);
// END Donwload Route



Auth::routes([
    'verify' => true,
]);
