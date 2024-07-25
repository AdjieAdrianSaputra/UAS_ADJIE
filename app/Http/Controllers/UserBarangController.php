<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class UserBarangController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('user.barang', compact('produk'));
    }
}
