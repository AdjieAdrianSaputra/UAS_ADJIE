<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pemesanan::all();
        return view('pesanan.index', compact('pesanan'));
    }

    public function detail($id)
    {
        $pesanan = Pemesanan::find($id);
        return view('pesanan.detail', compact('pesanan'));
    }

    public function destroy($id)
    {
        $pesanan = Pemesanan::find($id);
        $pesanan->delete();
        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil dihapus');
    }
}
