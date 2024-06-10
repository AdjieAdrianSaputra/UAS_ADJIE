<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\ProdukController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/daftar_barang', [BarangController::class, 'index'])->name('daftar_barang');
Route::get('/tambah-barang', [BarangController::class, 'create'])->name('barang.tambah_barang');
Route::post('/simpan-barang', [ProdukController::class, 'store'])->name('barang.simpan_barang');
Route::get('/edit_barang', [BarangController::class, 'edit'])->name('edit_barang');
Route::delete('/hapus_barang', [BarangController::class, 'destroy'])->name('hapus_barang');


