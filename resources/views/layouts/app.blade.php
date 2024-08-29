<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css') }}">

    <title>@yield('title', 'Alat Piknik BNA')</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-dark">
    <div class="container">
        <a class="navbar-brand text-white" href="/"><strong>Alat</strong> Piknik BNA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @auth
                    @if(Auth::user()->status === 'admin')
                        <li class="nav-item">
                            <a class="nav-link mr-4" href="{{ route('admin.home') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-4" href="{{ route('admin.daftar_barang') }}">DAFTAR BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-4" href="{{ route('admin.pesanan.index') }}">PESANAN</a>
                        </li>
                    @elseif(Auth::user()->status === 'user')
                        <li class="nav-item">
                            <a class="nav-link mr-4" href="{{ route('user.dashboard') }}">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-4" href="{{ route('user.barang') }}">DAFTAR BARANG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-4" href="{{ route('user.pesanan') }}">PESANAN ANDA</a>
                        </li>
                    @endif
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link mr-4" href="{{ route('login') }}">LOGIN</a>
                    </li>
                @endguest

                @auth
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link mr-4" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        LOGOUT
                    </a>
                </li>
                    <li class="nav-item d-flex align-items-center">
                        <img src="{{ Auth::user()->profile_picture_url }}" class="rounded-circle" alt="Profile Picture" width="30" height="30">
                        <span class="nav-link text-white ml-2">{{ Auth::user()->name }}</span>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
</body>
</html>
