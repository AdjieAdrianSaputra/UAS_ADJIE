<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class BarangController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('admin.daftar_barang', compact('produks'));
    }

    public function create()
    {
        return view('admin.tambah_barang');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('admin.edit_barang', compact('produk'));
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('admin.daftar_barang')->with('success', 'Barang berhasil dihapus');
    }
}
