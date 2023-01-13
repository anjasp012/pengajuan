<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneralManager\PengajuanDariManagerController;
use App\Http\Controllers\GeneralManager\SetujuController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\Manager\DataPengajuanDiskonController;
use App\Http\Controllers\Manager\DataPersetujuanSalesController;
use App\Http\Controllers\Manager\dataRevisiSalesController;
use App\Http\Controllers\Manager\DisetujuiGmController;
use App\Http\Controllers\Manager\PengajuanDiskonGmController;
use App\Http\Controllers\Manager\PengajuanDiskonKeGeneralManagerController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\Sales\DisetujuiController;
use App\Http\Controllers\Sales\PengajuanController;
use App\Http\Controllers\Sales\RevisiController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', DashboardController::class)->name('dashboard')->middleware('auth');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:1']], function () {
        Route::resource('jabatan', JabatanController::class);
        Route::get('user-generalmanager', [UserController::class, 'generalManager'])->name('user.generalManager');
        Route::get('user-manager', [UserController::class, 'manager'])->name('user.manager');
        Route::get('user-sales', [UserController::class, 'sales'])->name('user.sales');
        Route::match(['PUT', 'PATCH'], 'user-updateUserProjek/{user}', [UserController::class, 'updateUserProjek'])->name('user.updateUserProjek');
        Route::match(['PUT', 'PATCH'], 'user-updateUserProjek/{user}', [UserController::class, 'updateUserProjek'])->name('user.updateUserProjek');
        Route::get('user/change-password/{user}', [UserController::class, 'editPassword'])->name('user.editPassword');
        Route::match(['PUT', 'PATCH'], 'user/change-password/{user}', [UserController::class, 'updatePassword'])->name('user.updatePassword');
        Route::resource('user', UserController::class);
        Route::resource('projek', ProjekController::class);
        Route::resource('tipe', TipeController::class);
        Route::resource('produk', ProdukController::class);
    });
    // Sales
    Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index')->middleware('role:1,4');
    Route::resource('pengajuan', PengajuanController::class)->except('index')->middleware('role:4');
    Route::resource('revisi', RevisiController::class)->middleware('role:4');
    Route::get('disetujui', [DisetujuiController::class, 'index'])->name('disetujui.index')->middleware('role:1,4');
    Route::resource('disetujui', DisetujuiController::class)->except('index')->middleware('role:4');
    // });

    // Manager
    Route::group(['middleware' => ['role:3']], function () {
        Route::resource('datarevisi', dataRevisiSalesController::class);
        Route::resource('datapengajuandiskon', DataPengajuanDiskonController::class);
        Route::resource('datapersetujuansales', DataPersetujuanSalesController::class);
        Route::resource('pengajuandiskonkegm', PengajuanDiskonKeGeneralManagerController::class);
        Route::resource('disetujuigm', DisetujuiGmController::class);
    });

    // General Manager
    Route::group(['middleware' => ['role:2']], function () {
        Route::resource('pengajuandarimanager', PengajuanDariManagerController::class);
        Route::resource('setuju', SetujuController::class);
    });
});

Route::view('emailpengajuan', 'email.pengajuan');
