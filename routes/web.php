<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Middleware\CheckRole;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
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

//Postlogin
Route::post('/postlogin', [AuthController::class, 'postlogin']);

//Logout
Route::get('/logout', [AuthController::class, 'logout']);

//Reject
Route::get('/reject', [AuthController::class, 'reject']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//AUTH
Route::group(['middleware' => 'auth'], function(){
    //Admin
    Route::group(['middleware' => 'CheckRole:admin'], function(){
        // Route Akun
        Route::get('/akun', [AkunController::class, 'index']);
        Route::post('/akun/store', [AkunController::class, 'store'])->name('akun.store');
        Route::get('/akun/{id}/edit', [AkunController::class, 'edit']);
        Route::post('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');
        Route::get('/akun/delete/{id}', [AkunController::class, 'destroy']);
    });
    //Karyawan
    Route::group(['middleware' => 'CheckRole:karyawan'], function(){        
        // Route Barang
        Route::get('/barang', [BarangController::class, 'index']);
        Route::get('/barang/{id}/edit', [BarangController::class, 'edit']);
        Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
        Route::post('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
        Route::get('/barang/delete/{id}', [BarangController::class, 'destroy']);
    });
});

// Route Dashboard
// Route::get('/dashboard)

// Route Kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::post('/kategori/update', [KategoriController::class, 'update'])->name('kategoriedit');
Route::get('/kategori/delete/{id}', [KategoriController::class, 'destroy']);

// Route Supplier
Route::get('/supplier', [SupplierController::class, 'index']);
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::post('/supplier/edit', [SupplierController::class, 'update'])->name('supplieredit');
Route::get('/supplier/delete/{id}', [SupplierController::class, 'destroy']);

// Route Stok
Route::get('/stok', [StokController::class, 'index']);
Route::get('/stok/cari_stok/{id}', [StokController::class, 'cari_stok']);
Route::post('/stok/tambah_stok', [StokController::class, 'tambah_stok'])->name('stok.tambah_stok');
Route::post('/stok/kurang_stok', [StokController::class, 'kurang_stok'])->name('stok.kurang_stok');

// Route Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/transaksi', [TransaksiController::class, 'tambah_keranjang'])->name('transaksi.tambah_keranjang');
Route::post('/transaksi/proses', [TransaksiController::class, 'proses'])->name('transaksi.proses');
Route::get('/riwayat_transaksi', [TransaksiController::class, 'riwayat_transaksi']);
Route::get('/riwayat_transaksi/detail_transaksi/{id}', [TransaksiController::class, 'detail_transaksi']);
Route::get('/riwayat_transaksi/detail_transaksi/print_invoice/{id}', [TransaksiController::class, 'print_invoice']);
// Route::get('/laporan', [TransaksiController::class, 'filter']);
Route::get('/laporan', function () {
    return view('transaksi.laporan');
});
Route::get('/laporan/filter', [TransaksiController::class, 'filter_lap'])->name('laporan_filter');


