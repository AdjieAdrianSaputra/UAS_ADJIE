<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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
        <p class="lead font-weight-bold">Bersantailah Dunia Terlalu Melelahkan <br> 
        Enjoy Your Life</p>
    </div>
</div>
<!-- Akhir Jumbotron -->

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
                    <a class="nav-link mr-4" href="('daftar_menu') }}">DAFTAR MENU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="('pesanan') }}">PESANAN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="('logout') }}">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div> 
</nav>
<!-- Akhir Navbar -->

<!-- Menu -->    
<div class="container">
    <div class="judul text-center mt-5">
        <h3 class="font-weight-bold">Penyewaan Alat Piknik BNA</h3>
        <h5>Setui, Banda Aceh, Aceh
        <br>Buka Jam <strong>10:00 - 22:00</strong></h5>
    </div>

    <div class="row mb-5 mt-5">
        <div class="col-md-6 d-flex justify-content-end">
            <div class="card bg-dark text-white border-light">
                <img src="{{ asset('images/background/bg1.jpg') }}" class="card-img" alt="Lihat Daftar Menu">
                <div class="card-img-overlay mt-5 text-center">
                    <a href="('daftar_menu') }}" class="btn btn-primary">LIHAT DAFTAR MENU</a>
                </div>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-start">
            <div class="card bg-dark text-white border-light">
                <img src="{{ asset('images/background/bg2.jpg') }}" class="card-img" alt="Lihat Pesanan">
                <div class="card-img-overlay mt-5 text-center">
                    <a href="('pesanan') }}" class="btn btn-primary">LIHAT PESANAN</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Menu -->

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>
