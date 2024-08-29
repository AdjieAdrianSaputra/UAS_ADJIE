<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesananTable extends Migration
{
    public function up()
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Kunci asing untuk user
            $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade'); // Kunci asing untuk produk
            $table->date('tanggal_pemesanan');
            $table->decimal('total_belanja', 10, 2); // Misalnya, 10 digit total belanja dengan 2 digit desimal
            $table->string('status'); // Status pemesanan, misalnya: pending, confirmed
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('pesanan');
    }
}
