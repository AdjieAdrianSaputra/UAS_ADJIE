<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Form Edit Barang</title>
</head>
<body>
<div class="container">
    <h3 class="text-center mt-3 mb-5">SILAHKAN EDIT BARANG</h3>
    <div class="card p-5 mb-5">
        <form method="POST" action="{{ route('barang.update', $produk->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $produk->nama_barang }}" placeholder="Masukkan Nama Barang">
            </div>
            <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control" id="jenis_barang" name="jenis_barang">
                    <option value="Paketan" {{ $produk->jenis_barang == 'Paketan' ? 'selected' : '' }}>Paketan</option>
                    <option value="Satuan" {{ $produk->jenis_barang == 'Satuan' ? 'selected' : '' }}>Satuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control" id="stok" name="stok" value="{{ $produk->stok }}" placeholder="Masukkan Stok">
            </div>
            <div class="form-group">
                <label for="harga">Harga Barang</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $produk->harga }}" placeholder="Masukkan Harga Barang">
            </div>
            <div class="form-group">
                <label for="gambar">Foto Barang</label>
                <input type="file" class="form-control-file border" id="gambar" name="gambar">
            </div><br>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
