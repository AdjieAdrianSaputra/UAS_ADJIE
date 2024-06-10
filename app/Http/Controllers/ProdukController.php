<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,',
        ]);

        // Simpan gambar ke folder public/uploads
        $path = $request->file('gambar')->store('uploads', 'public');

        // Simpan path gambar ke database
        $produk = new Produk();
        $produk->nama_barang = $request->nama_barang;
        $produk->harga = $request->harga;
        $produk->gambar = $path;
        $produk->save();

        return redirect()->route('daftar_barang')->with('success', 'Barang berhasil ditambahkan');
    }
}
