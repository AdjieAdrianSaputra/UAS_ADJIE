<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class BarangController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('barang.daftar_barang', compact('produk'));
    }

    public function create()
    {
        return view('barang.tambah_barang');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('barang.edit_barang', compact('produk'));
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('daftar_barang')->with('success', 'Barang berhasil dihapus');
    }
}
