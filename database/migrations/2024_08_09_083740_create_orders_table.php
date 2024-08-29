<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID pesanan
            $table->unsignedBigInteger('user_id'); // ID pengguna
            $table->unsignedBigInteger('produk_id'); // ID produk
            $table->string('status')->default('pending'); // Status pesanan
            $table->timestamps(); // Kolom created_at dan updated_at

            // Menambahkan foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
