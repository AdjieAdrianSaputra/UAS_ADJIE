<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesananTable extends Migration
{
    /**
     * Jalankan migrasi untuk membuat tabel pemesanan.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id(); // ID default sebagai primary key
            $table->unsignedBigInteger('user_id'); // Kolom untuk menyimpan ID pengguna
            $table->unsignedBigInteger('produk_id'); // Kolom untuk menyimpan ID produk
            $table->date('tanggal_pemesanan'); // Tanggal pemesanan
            $table->integer('total_belanja'); // Total belanja
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Menambahkan foreign key untuk user_id
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Jika user dihapus, hapus juga pemesanan terkait

            // Menambahkan foreign key untuk produk_id
            $table->foreign('produk_id')
                ->references('id')
                ->on('produks')
                ->onDelete('cascade'); // Jika produk dihapus, hapus juga pemesanan terkait
        });
    }

    /**
     * Mundurkan migrasi untuk menghapus tabel pemesanan.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
}
