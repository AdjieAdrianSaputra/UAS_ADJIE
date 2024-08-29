<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan halaman home untuk user
    public function dashboard()
    {
        return view('user.dashboard');
    }

    // Menampilkan daftar barang untuk user
    public function Barang()
    {
        $produks = Produk::all(); // Mengambil semua produk
        return view('user.barang', compact('produks'));
    }

    // Menampilkan halaman pesanan untuk user
    public function pesanan()
    {
        $pesanans = Pemesanan::where('user_id', Auth::id())->get(); // Mengambil pesanan berdasarkan ID user yang login
        return view('user.pesanan', compact('pesanans'));
    }

    // Menampilkan detail pesanan
    public function detail($id)
    {
        $pemesanan = Pemesanan::findOrFail($id); // Mengambil pemesanan berdasarkan ID
        return view('user.pesanan_detail', compact('pemesanan'));
    }
}
