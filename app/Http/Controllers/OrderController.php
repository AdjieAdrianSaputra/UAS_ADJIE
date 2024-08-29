<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Method untuk mengkonfirmasi pesanan
     * Hanya dapat diakses oleh admin
     */
    public function confirm($orderId)
    {
        // Temukan pesanan berdasarkan ID
        $order = Order::findOrFail($orderId);

        // Pastikan hanya admin yang bisa mengkonfirmasi pesanan
        if (Auth::user()->status !== 'admin') {
            return redirect()->back()->withErrors(['message' => 'Unauthorized action.']);
        }

        // Update status pesanan menjadi 'confirmed'
        $order->status = 'confirmed';
        $order->save();

        // Redirect ke halaman admin dengan pesan sukses
        return redirect()->route('admin.pesanan')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }

    /**
     * Method untuk menangani proses pembelian
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produks,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Produk::findOrFail($request->input('product_id'));

        try {
            // Buat pesanan baru
            $order = new Order();
            $order->user_id = Auth::id();
            $order->produk_id = $product->id;
            $order->quantity = $request->input('quantity');
            $order->tanggal_pemesanan = now();
            $order->total_belanja = $product->harga * $request->input('quantity');
            $order->status = 'pending'; // Default status
            $order->save();

            return redirect()->route('user.pesanan')->with('success', 'Pesanan berhasil dibuat.');
        } catch (\Exception $e) {
            Log::error('Error saat membuat pesanan: ' . $e->getMessage());
            return redirect()->route('user.pesanan')->with('error', 'Terjadi kesalahan saat memproses pesanan.');
        }
    }

    /**
     * Method untuk menampilkan riwayat pesanan pengguna
     */
    public function userOrders()
    {
        // Ambil semua pesanan untuk pengguna yang sedang login
        $orders = Order::where('user_id', Auth::id())->with('produk')->get();

        // Tampilkan halaman riwayat pesanan pengguna
        return view('user.pesanan', ['orders' => $orders]);
    }
    public function detail($id)
{
    $order = Order::with('produk')->findOrFail($id);
    return view('admin.pesanan.detail', compact('order'));
}
public function destroy($id)
{
    // Temukan pesanan berdasarkan ID
    $order = Order::findOrFail($id);

    // Hapus pesanan
    $order->delete();

    // Redirect ke halaman admin pesanan dengan pesan sukses
    return redirect()->route('admin.pesanan')->with('success', 'Pesanan berhasil dihapus.');
}

}
