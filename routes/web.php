<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PegawaiController;

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
    return view('auth/login');
});

Route::middleware(['auth'])->group(function() {
    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('halaman.dashboard');
    })->name('dashboard');

    // PELANGGAN
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');

    // KATEGORI
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/store', [KategoriController::class, 'store'])->name('tambahKategori');
    Route::delete('/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('hapusKategori');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori/update', [KategoriController::class, 'update'])->name('ubahKategori');

    // PRODUK
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('detailProduk');
    Route::post('/produk/store', [ProdukController::class, 'store'])->name('tambahProduk');
    Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
    Route::put('/produk/update', [ProdukController::class, 'update'])->name('ubahProduk');
    Route::delete('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('hapusProduk');

    // PEGAWAI
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
});
require __DIR__.'/auth.php';
