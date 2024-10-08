<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = ['user_id', 'produk_id', 'tanggal_pemesanan', 'total_belanja'];

    // Relasi dengan model Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Relasi dengan model User (jika diperlukan)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
