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
            //'jenis_barang' => 'required|string',
            //'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,',
        ]);

        // Simpan gambar ke folder public/uploads
        $path = $request->file('gambar')->store('uploads', 'public');

        // Simpan path gambar ke database
        $produk = new Produk();
        $produk->nama_barang = $request->nama_barang;
        //$produk->jenis_barang = $request->jenis_barang;
        //$produk->stok = $request->stok;
        $produk->harga = $request->harga;
        $produk->gambar = $path;
        $produk->save();

        return redirect()->route('daftar_barang')->with('success', 'Barang berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            //'jenis_barang' => 'required|string',
            //'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $barang = Produk::find($id);
        $barang->nama_barang = $request->nama_barang;
        //$barang->jenis_barang = $request->jenis_barang;
        //$barang->stok = $request->stok;
        $barang->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('uploads', 'public');
            $barang->gambar = $path;
        }

        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate');
    }
}
