<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans'; // Nama tabel yang digunakan di database

    protected $fillable = [
        'user_id',
        'produk_id',
        'tanggal_pemesanan',
        'total_belanja',
        'status',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
