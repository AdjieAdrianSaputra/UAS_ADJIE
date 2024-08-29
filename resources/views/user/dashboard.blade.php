<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

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
    </style>

    <title>Alat Piknik BNA</title>
</head>
<body>

<!-- Jumbotron -->
<div class="jumbotron jumbotron-fluid text-center">
    <div class="container">
        <h1 class="display-4"><span class="font-weight-bold">PENYEWAAN ALAT PIKNIK BNA</span></h1>
        <hr>
        <p class="lead font-weight-bold"><i> Bersantailah Dunia Terlalu Melelahkan<br> 
        Enjoy Your Life</i></p>
    </div>
</div>
<!-- Akhir Jumbotron -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="/"><strong>Alat</strong> Piknik BNA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link mr-4" href="('user_dashboard') ">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{ route('user.barang') }}">DAFTAR BARANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{ route('user.pesanan') }}">PESANAN SAYA</a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link mr-4" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div> 
</nav>
<!-- Akhir Navbar -->

<!-- Barang -->    
<div class="container">
    <div class="judul text-center mt-5">
        <h3 class="font-weight-bold">Penyewaan Alat Piknik BNA</h3>
        <h5><i>Setui, Banda Aceh, Aceh
        <br> Buka Jam <strong><u> 10:00 - 22:00</strong></u></i></h5>
    </div>

    <div class="row mb-5 mt-5">
        <div class="col-md-6 d-flex justify-content-end">
            <div class="card bg-dark text-white border-light">
                <img src="{{ asset('images/background/bg1.jpg') }}" class="card-img" alt="Lihat Daftar Barang">
                <div class="card-img-overlay mt-5 text-center">
                    <a href="('user_barang')" class="btn btn-primary">LIHAT DAFTAR BARANG</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-start">
            <div class="card bg-dark text-white border-light">
                <img src="{{ asset('images/background/bg2.jpg') }}" class="card-img" alt="Lihat Pesanan">
                <div class="card-img-overlay mt-5 text-center">
                    <a href="('user_pesanan') " class="btn btn-primary">LIHAT PESANAN</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Barang -->

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

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>
