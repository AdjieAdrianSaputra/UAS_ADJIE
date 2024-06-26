<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;

Route::post('register', [RegisterController::class, 'register']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/daftar_barang', [BarangController::class, 'index'])->name('daftar_barang');
Route::get('/tambah-barang', [BarangController::class, 'create'])->name('barang.tambah_barang');
Route::post('/simpan-barang', [ProdukController::class, 'store'])->name('barang.simpan_barang');
Route::get('/barang/{id}/edit-barang', [BarangController::class, 'edit'])->name('barang.edit_barang');
Route::put('/barang/{id}', [ProdukController::class, 'update'])->name('barang.update');
Route::get('/barang', [ProdukController::class, 'index'])->name('barang.index');
Route::delete('/barang/{id}', [ProdukController::class, 'destroy'])->name('barang.destroy');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/{id}', [PesananController::class, 'detail'])->name('pesanan.detail');
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');


