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
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->integer('kuantitas');
            $table->string('sub_total_harga', 255);
            $table->unsignedBigInteger('transaksi_id_transaksi');
            $table->unsignedBigInteger('menu_id_menu');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            // Composite primary key
            $table->primary(['menu_id_menu', 'transaksi_id_transaksi']);

            // Foreign keys
            $table->foreign('menu_id_menu')->references('id_menu')->on('menu')->onDelete('cascade');
            $table->foreign('transaksi_id_transaksi')->references('id_transaksi')->on('transaksi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
