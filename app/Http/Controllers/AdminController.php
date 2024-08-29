<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Menampilkan halaman home untuk admin
    public function home()
    {
        return view('admin.home');
    }

    // Menampilkan daftar barang untuk admin
    public function daftarBarang()
    {
        $produks = Produk::all(); // Mengambil semua produk
        return view('admin.daftar_barang', compact('produks'));
    }

    // Menampilkan halaman pesanan untuk admin
    public function index()
    {
        $pesanans = Pemesanan::with('produk', 'user')->get(); // Mengambil semua pesanan beserta produk dan user
        return view('admin.pesanan.index', compact('pesanans'));
    }

    // Menampilkan detail pesanan
    public function detail($id)
    {
        $pemesanan = Pemesanan::with('produk', 'user')->findOrFail($id); // Mengambil pemesanan berdasarkan ID
        return view('admin.pesanan.detail', compact('pemesanan'));
    }
}
