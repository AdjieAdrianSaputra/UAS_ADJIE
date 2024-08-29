<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'stok',
        'harga',
        'gambar'
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'produk_id' , 'id');
    }
}
