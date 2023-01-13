<?php

use App\Http\Controllers\OptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/list-projek', [OptionController::class, 'projekList'])->name('projekList');
Route::get('list-produk/{projek:id_projek}', [OptionController::class, 'produkByProjek'])->name('produkByProjek');
Route::get('list-tipe/{projek:id_projek}', [OptionController::class, 'tipeByProjek'])->name('tipeByProjek');
Route::get('harga-produk/{produk:id_produk}', [OptionController::class, 'hargaProduk'])->name('hargaProduk');
Route::get('manager-projek/{projek:id_projek}', [OptionController::class, 'managerProjek'])->name('managerProjek');
Route::get('general-manager-projek/{projek:id_projek}', [OptionController::class, 'generalManagerProjek'])->name('generalManagerProjek');
