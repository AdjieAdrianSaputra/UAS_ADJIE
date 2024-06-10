@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ route('barang.tambah_barang') }}" class="btn btn-success mt-3">Tambah Daftar Barang</a>
    <div class="row">

      @foreach($produks as $item)
      <div class="col-md-3 mt-4">
        <div class="card border-dark">
          <img src="{{ asset('uploads/' . $item->gambar) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">{{ $item->nama_barang }}</h5>
            <label class="card-text harga"><strong>Rp.</strong> {{ number_format($item->harga) }}</label><br>
            <a href="('edit_barang', $item->id) }}" class="btn btn-success btn-sm btn-block">EDIT</a>
            <a href="('hapus_barang', $item->id) }}" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
</div>
@endsection
