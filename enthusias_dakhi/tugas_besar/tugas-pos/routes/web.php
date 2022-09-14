<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
//Route::get('/kategoris', [App\Http\Controllers\KategoriController::class, 'index']);
//Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
//Route::get('/pembelians', [App\Http\Controllers\PembelianController::class, 'index']);
Route::get('/pembelian_details', [App\Http\Controllers\PembelianDetailController::class, 'index']);
//Route::get('/pengeluarans', [App\Http\Controllers\PengeluaranController::class, 'index']);
//Route::get('/penjualans', [App\Http\Controllers\PenjualanController::class, 'index']);
Route::get('/penjualan_details', [App\Http\Controllers\PenjualanDetailController::class, 'index']);
//Route::get('/produks', [App\Http\Controllers\ProdukController::class, 'index']);
//Route::get('/suppliers', [App\Http\Controllers\SupplierController::class, 'index']);

Route::resource('/members', App\Http\Controllers\MemberController::class);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
Route::resource('/produks', App\Http\Controllers\ProdukController::class);
Route::get('/api/produks', [App\Http\Controllers\ProdukController::class, 'api']);
Route::resource('/kategoris', App\Http\Controllers\KategoriController::class);
Route::get('/api/kategoris', [App\Http\Controllers\KategoriController::class, 'api']);
Route::resource('/pembelians', App\Http\Controllers\PembelianController::class);
Route::get('/api/pembelians', [App\Http\Controllers\PembelianController::class, 'api']);
Route::resource('/pengeluarans', App\Http\Controllers\PengeluaranController::class);
Route::get('/api/pengeluarans', [App\Http\Controllers\pengeluaranController::class, 'api']);
Route::resource('/penjualans', App\Http\Controllers\PenjualanController::class);
Route::get('/api/penjualans', [App\Http\Controllers\PenjualanController::class, 'api']);
Route::resource('/suppliers', App\Http\Controllers\SupplierController::class);
Route::get('/api/suppliers', [App\Http\Controllers\SupplierController::class, 'api']);
