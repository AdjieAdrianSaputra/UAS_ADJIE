<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Daftar Barang</title>

    <style>
        body {
            background: linear-gradient(120deg, #000000, #434343);
            color: #ffffff;
        }
        .jumbotron {
            background: linear-gradient(120deg, #434343, #000000);
            color: #ffffff;
        }
        .card {
            background: rgba(0, 0, 0, 0.8);
        }
        .navbar {
            background: linear-gradient(120deg, #000000, #434343);
        }

      .card-img-top {
          width: 100%;
          height: 200px;
          object-fit: fill;

      }
  </style>

</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}"><strong>Alat</strong> Piknik BNA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{ route('home') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{ route('daftar_barang') }}">DAFTAR BARANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{ route('pesanan.index') }}">PESANAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="('logout') }}">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div> 
</nav>
<!-- Akhir Navbar -->

<br><br>

<div class="container">
    <h1 align="center">Daftar Barang</h1>
    <a href="{{ route('barang.tambah_barang') }}" class="btn btn-success mb-3">Tambah Daftar Barang</a>
    <div class="row">
        @foreach($produks as $produk)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="Gambar Barang">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produk->nama_barang }}</h5>
                        <p class="card-text">Rp. {{ $produk->harga }}</p>
                        <a href="{{ route('barang.edit_barang', $produk->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('barang.destroy', $produk->id) }}" method="POST" class="d-inline">
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
<!-- Awal Footer -->
<hr class="footer">
<div class="container">
    <div class="row footer-body">
        <div class="col-md-6">
            <div class="copyright">
                <strong>Copyright</strong> <i class="far fa-copyright"></i> 2024 -  Designed by Adjieadrian
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-end">
            <div class="icon-contact">
                <label class="font-weight-bold">Follow Us </label>
                <a href="#"><img src="{{ asset('images/icon/fb.png') }}" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
                <a href="#"><img src="{{ asset('images/icon/ig.png') }}" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
                <a href="#"><img src="{{ asset('images/icon/twitter.png') }}" class="" data-toggle="tooltip" title="Twitter"></a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Footer -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
