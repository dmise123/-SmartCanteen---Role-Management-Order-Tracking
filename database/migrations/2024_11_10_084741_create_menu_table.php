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
        Schema::create('menu', function (Blueprint $table) {
            $table->id('id_menu')->autoIncrement();
            $table->string('nama_menu', 255);
            $table->string('path_foto', 255)->default('');
            $table->string('harga', 255);
            $table->boolean('status_tersedia')->default(false);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->unsignedBigInteger('toko_users_id_users');
            $table->foreign('toko_users_id_users')->references('users_id_users')->on('toko')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
