<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi')->autoIncrement();
            $table->string('total_harga', 255);
            $table->string('deskripsi', 500)->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('mahasiswa_id_users');
            $table->unsignedBigInteger('toko_id_users');
            $table->unsignedBigInteger('status_pesanan_id_status');
            $table->foreign('mahasiswa_id_users')->references('users_id_users')->on('mahasiswa');
            $table->foreign('toko_id_users')->references('users_id_users')->on('toko')->onDelete('cascade');
            $table->foreign('status_pesanan_id_status')->references('id_status_pesanan')->on('status_pesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
