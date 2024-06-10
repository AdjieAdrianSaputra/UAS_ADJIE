<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">

    <title>Halaman Registrasi</title>
  </head>
  <body>
 
 <!-- Form Registrasi -->
  <div class="container">
    <h3 class="text-center mt-3 mb-5">HALAMAN REGISTRASI</h3>
    <div class="card p-5 mb-5">
    <form method="POST" action="{{ route('register') }}">
    @csrf

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="user">Username</label>
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group col-md-6">
          <label for="pass">Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
          
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
          </div>
      </div>
      <div class="form-group">
        <label for="nama">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Laki-Laki">
          <label class="form-check-label" for="jk">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Perempuan">
          <label class="form-check-label" for="jk">Perempuan</label>
        </div>
      </div>
      <div class="form-group">
        <label for="tgl">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl" name="tanggal_lahir">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="rumah">Alamat</label>
          <input type="text" class="form-control" id="rumah" name="alamat" placeholder="Masukan Alamat">
        </div>
        <div class="form-group col-md-2">
          <label for="telp">No. Telephone</label>
          <input type="text" class="form-control" id="telp" name="hp" placeholder="No. Telephone">
        </div>
        <div class="form-group col-md-4">
          <label for="sts">Status Registrasi</label>
          <select id="sts" class="form-control" name="status">
            <option selected>Pilih...</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>     
      <button type="submit" class="btn btn-primary">Register</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </form>
  </div>
  </div>
  <!-- Akhir Form Registrasi -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
  </body>
</html>
