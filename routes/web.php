<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserBarangController;
use App\Http\Controllers\UserPesananController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::post('/pesanan/{id}', [OrderController::class, 'store'])->name('user.pesanan');
    Route::get('/pesanan', [OrderController::class, 'userOrders'])->name('user.pesanan');
    // Menampilkan daftar pesanan (GET)
Route::get('/user/pesanan', [UserPesananController::class, 'index'])->name('user.pesanan');

// Menyimpan pesanan (POST)
Route::post('/user/pesanan/store', [OrderController::class, 'store'])->name('user.pesanan.store');
Route::post('/pesanan', [OrderController::class, 'store'])->name('pesan.store');



    Route::middleware(['status:admin'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/daftar-barang', [BarangController::class, 'index'])->name('admin.daftar_barang');
        Route::get('/tambah-barang', [BarangController::class, 'create'])->name('barang.tambah_barang');
        Route::post('/simpan-barang', [ProdukController::class, 'store'])->name('barang.simpan_barang');
        Route::get('/barang/{id}/edit-barang', [BarangController::class, 'edit'])->name('barang.edit_barang');
        Route::put('/barang/{id}', [ProdukController::class, 'update'])->name('admin.barang.update');
        Route::get('/barang', [ProdukController::class, 'index'])->name('admin.barang.index');
        Route::delete('/barang/{id}', [ProdukController::class, 'destroy'])->name('admin.barang.destroy');
        Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
        Route::get('/pesanan/{id}', [PesananController::class, 'detail'])->name('pesanan.detail');
        Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('admin.pesanan.destroy');
        Route::get('/admin/pesanan', [OrderController::class, 'index'])->name('admin.pesanan');
        Route::post('/admin/pesanan/confirm/{orderId}', [OrderController::class, 'confirm'])->name('admin.pesanan.confirm');

        Route::get('/admin/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
        Route::get('/admin/pesanan/{id}/detail', [PesananController::class, 'detail'])->name('admin.pesanan.detail');
        Route::delete('/admin/pesanan/{id}', [PesananController::class, 'hapus'])->name('admin.pesanan.destroy');
        Route::post('/produk/{id}/pesan', [PesananController::class, 'pesan'])->name('pesan');



        
    });

    Route::middleware(['status:user'])->group(function () {
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/user/barang', [UserBarangController::class, 'index'])->name('user.barang');
        Route::get('/user/pesanan', [UserPesananController::class, 'index'])->name('user.pesanan');
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

        // Rute pemesanan barang
        Route::get('/user/pesanan', [UserPesananController::class, 'index'])->name('user.pesanan');
        Route::post('/user/pesanan/store', [UserPesananController::class, 'store'])->name('user.pesanan.store');
    
        // Hapus pesanan
        Route::post('/user/hapus-pesanan', [UserController::class, 'hapusPesanan'])->name('user.hapus.pesanan');
        
    });
});
