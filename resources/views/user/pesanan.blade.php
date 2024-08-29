@extends('layouts.app')

@section('title', 'Pesanan Anda')

@section('content')
<div class="container mt-5">
    <h3 class="text-center font-weight-bold">Pesanan Anda</h3>

    @if($pesanan->isEmpty())
        <div class="alert alert-warning">
            Pesanan kosong, silahkan pesan dahulu.
        </div>
        <a href="{{ route('user.barang') }}" class="btn btn-primary">Lihat Barang</a>
    @else
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @php $totalBelanja = 0; @endphp
                @foreach($pesanan as $index => $item)
                    @php 
                        $subharga = $item->produk ? $item->produk->harga * $item->quantity : 0;
                        $totalBelanja += $subharga;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->produk ? $item->produk->nama_barang : 'Nama barang tidak tersedia' }}</td>
                        <td>Rp. {{ $item->produk ? number_format($item->produk->harga, 0, ',', '.') : '0' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp. {{ number_format($subharga, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>
                            <form action="{{ route('user.hapus.pesanan', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th colspan="3">Rp. {{ number_format($totalBelanja, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
        <form method="POST" action="{{ route('user.pesanan.store') }}">
            @csrf
            <div class="d-flex justify-content-between">
                <a href="{{ route('user.barang') }}" class="btn btn-primary btn-sm">Lihat Barang</a>
                <button type="submit" class="btn btn-success btn-sm">Konfirmasi Pesanan</button>
            </div>
        </form>
    @endif
</div>
@endsection
