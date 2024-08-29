<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class UserPesananController extends Controller
{
    /**
     * Menampilkan daftar pesanan pengguna yang sedang masuk.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pesanan = Pesanan::where('user_id', Auth::id())->with('produk')->get();
        return view('user.pesanan', ['pesanan' => $pesanan]);
    }

    /**
     * Proses pembelian produk berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function beli($id)
    {
        // Validasi ID produk
        $produk = Produk::find($id);

        if (!$produk) {
            // Jika produk tidak ditemukan, redirect dengan pesan kesalahan
            return Redirect::route('user.barang')->with('error', 'Produk tidak ditemukan.');
        }

        // Validasi user yang sedang login
        if (!Auth::check()) {
            return Redirect::route('login')->with('error', 'Anda harus login untuk melakukan pembelian.');
        }

        try {
            // Buat pemesanan baru
            $pemesanan = new Pemesanan();
            $pemesanan->user_id = Auth::id();
            $pemesanan->produk_id = $produk->id;
            $pemesanan->tanggal_pemesanan = now();
            $pemesanan->total_belanja = $produk->harga;
            $pemesanan->save();

            // Redirect dengan pesan sukses
            return Redirect::route('user.pesanan')->with('success', 'Produk berhasil dipesan.');
        } catch (\Exception $e) {
            // Log error dan redirect dengan pesan kesalahan
            Log::error('Error saat membuat pemesanan: ' . $e->getMessage());
            return Redirect::route('user.pesanan')->with('error', 'Terjadi kesalahan saat memproses pesanan.');
        }
    }

    /**
     * Menyimpan pesanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $pemesanan = new Pesanan();
        $pemesanan->user_id = Auth::id();
        $pemesanan->produk_id = $validated['produk_id'];
        $pemesanan->tanggal_pemesanan = now();
        $pemesanan->total_belanja = Produk::find($validated['produk_id'])->harga * $validated['quantity'];
        $pemesanan->save();

        return redirect()->route('user.pesanan')->with('success', 'Pesanan berhasil dibuat.');
    }

}
