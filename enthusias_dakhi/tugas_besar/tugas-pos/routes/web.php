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
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index']);
//Route::get('/member', [App\Http\Controllers\MemberController::class, 'index']);
Route::get('/pembelian', [App\Http\Controllers\PembelianController::class, 'index']);
Route::get('/pembelian_detail', [App\Http\Controllers\PembelianDetailController::class, 'index']);
Route::get('/pengeluaran', [App\Http\Controllers\PengeluaranController::class, 'index']);
Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index']);
Route::get('/penjualan_detail', [App\Http\Controllers\PenjualanDetailController::class, 'index']);
Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index']);
Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index']);

Route::resource('/member', App\Http\Controllers\MemberController::class);
Route::get('/api/members', [App\Http\Controllers\MemberController::class, 'api']);
