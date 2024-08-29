<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

    <title>Alat Piknik BNA</title>
</head>
<body>
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4"><span class="font-weight-bold">PENYEWAAN ALAT PIKNIK BNA</span></h1>
            <hr>
            <p class="lead font-weight-bold">Bersantailah Dunia Terlalu Melelahkan <br> Enjoy Your Life</p>
        </div>
    </div>
    <!-- Akhir Jumbotron -->
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
            object-fit: cover;
        }
    </style>

    <!-- Navbar -->
    @include('layouts.app')
    <!-- Akhir Navbar -->

    <!-- Menu -->
    <div class="container">
        <div class="row mt-3">
            @foreach($produk as $item)
<div class="col-md-3 mt-4">
    <div class="card border-dark">
        <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->nama_barang }}">
        <div class="card-body">
            <h5 class="card-title font-weight-bold">{{ $item->nama_barang }}</h5>
            <label class="card-text harga"><strong>Rp.</strong> {{ number_format($item->harga) }}</label><br>

            <!-- Formulir pemesanan -->
            <form action="{{ route('user.pesanan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="produk_id" value="{{ $item->id }}">
                <input type="number" name="quantity" min="1" required>
                <input type="hidden" name="status" value="pending"> <!-- Set default status -->
                <button type="submit" class="btn btn-primary">Pesan</button>
            </form>
        </div>
    </div>
</div>
@endforeach
        </div>
    </div>
    <!-- Akhir Menu -->

    <!-- Awal Footer -->
    <hr class="footer">
    <div class="container">
        <div class="row footer-body">
            <div class="col-md-6">
                <div class="copyright">
                    <strong>Copyright</strong> <i class="far fa-copyright"></i> 2024 - Designed by Adjieadrian
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end">
                <div class="icon-contact">
                    <label class="font-weight-bold">Follow Us </label>
                    <a href="#"><img src="{{ asset('images/icon/fb.png') }}" class="mr-3 ml-4" data-toggle="tooltip" title="Facebook"></a>
                    <a href="#"><img src="{{ asset('images/icon/ig.png') }}" class="mr-3" data-toggle="tooltip" title="Instagram"></a>
                    <a href="#"><img src="{{ asset('images/icon/twitter.png') }}" data-toggle="tooltip" title="Twitter"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Footer -->

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>
