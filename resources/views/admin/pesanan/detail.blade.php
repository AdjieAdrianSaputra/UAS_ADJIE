@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container mt-5">
    <h3 class="text-center">Detail Pesanan #{{ $pesanan->id }}</h3>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID Pesanan</th>
                <td>{{ $pesanan->id }}</td>
            </tr>
            <tr>
                <th>Nama Produk</th>
                <td>{{ $pesanan->produk->nama ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Jumlah</th>
                <td>{{ $pesanan->jumlah ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Total Belanja</th>
                <td>Rp. {{ number_format($pesanan->total_belanja, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Tanggal Pesanan</th>
                <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_pemesanan)->format('d-m-Y') }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('admin.pesanan.index') }}" class="btn btn-primary">Kembali</a>
</div>
@endsection
