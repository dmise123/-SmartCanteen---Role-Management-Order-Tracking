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
        Schema::create('rekam_bayar', function (Blueprint $table) {
            $table->timestamp('waktu_bayar');
            $table->string('nominal', 255);
            $table->unsignedBigInteger('transaksi_id_transaksi');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->primary('transaksi_id_transaksi');
            $table->foreign('transaksi_id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_bayar');
    }
};
