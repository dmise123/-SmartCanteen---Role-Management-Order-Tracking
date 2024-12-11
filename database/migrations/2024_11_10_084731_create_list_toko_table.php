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
        Schema::create('toko', function (Blueprint $table) {
            $table->char('is_open', 1);
            $table->string('nama_toko', 255);
            $table->string('deskripsi_toko', 255);
            $table->string('path_foto', 255)->nullable();
            $table->unsignedBigInteger('kantin_id_kantin');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('users_id_users');
            $table->primary('users_id_users');
            $table->foreign('kantin_id_kantin')->references('id_kantin')->on('kantin')->onDelete('cascade');
            $table->foreign('users_id_users')->references('id_users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_toko');
    }
};
