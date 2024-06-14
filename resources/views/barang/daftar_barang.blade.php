<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Daftar Barang</title>

    <style>
      .card-img-top {
          width: 100%;
          height: 200px;
          object-fit: fill;
      }
  </style>

</head>
<body>
<div class="container">
    <h1>Daftar Barang</h1>
    <a href="{{ route('barang.tambah_barang') }}" class="btn btn-success mb-3">Tambah Daftar Barang</a>
    <div class="row">
        @foreach($produks as $produk)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="Gambar Barang">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                        <p class="card-text">Rp. {{ $produk->harga }}</p>
                        <a href="{{ route('edit_barang', $produk->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('hapus_barang', $produk->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
