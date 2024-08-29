<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    /**
     * Menampilkan daftar pesanan untuk admin.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil semua pesanan untuk admin
        $pesanans = Pesanan::all();
        
        // Tampilkan halaman pesanan
        return view('admin.pesanan.index', ['pesanan' => $pesanans]);
    }

    /**
     * Menampilkan detail pesanan berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function detail($id)
    {
        // Mendapatkan data pesanan dan produk terkait
        $pesanan = Pesanan::with('produk')
                            ->where('id', $id)
                            ->first();

        // Jika pesanan tidak ditemukan, tampilkan halaman 404
        if (!$pesanan) {
            abort(404, 'Pesanan tidak ditemukan.');
        }

        // Hitung total belanja jika ada jumlah produk
        $totalBelanja = $pesanan->produk ? $pesanan->produk->harga * $pesanan->jumlah : 0;

        return view('admin.pesanan.detail', [
            'pesanan' => $pesanan,
            'totalBelanja' => $totalBelanja,
        ]);
    }

    /**
     * Menambahkan pesanan baru ke basis data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pesan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Temukan produk berdasarkan ID
        $produk = Produk::find($id);

        // Jika produk tidak ditemukan, tampilkan pesan kesalahan
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }

        // Simpan pesanan ke basis data
        Pemesanan::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'jumlah' => $request->quantity,
            'status' => 'pending', // Status default, bisa diubah
        ]);

        // Redirect ke halaman pesanan dengan pesan sukses
        return redirect()->route('user.pesanan')->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Menampilkan daftar pesanan untuk pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function userPesanan()
    {
        // Mengambil pesanan untuk pengguna yang sedang login
        $pesanan = Pemesanan::with('produk')->where('user_id', Auth::id())->get();
        return view('user.pesanan', compact('pesanan'));
    }

    /**
     * Menghapus pesanan berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapus($id)
    {
        // Temukan pesanan berdasarkan ID
        $pesanan = Pesanan::find($id);

        // Jika pesanan tidak ditemukan, tampilkan pesan kesalahan
        if (!$pesanan) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }

        // Hapus pesanan
        $pesanan->delete();

        // Redirect ke halaman pesanan dengan pesan sukses
        return redirect()->route('user.pesanan')->with('success', 'Pesanan berhasil dihapus.');
    }
    
}
