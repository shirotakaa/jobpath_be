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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id('id_perusahaan');
            $table->string('nama_perusahaan');
            $table->string('jenis_perusahaan');
            $table->string('password');
            $table->string('logo', 255);
            $table->string('email')->unique();
            $table->string('nomor_telepon');
            $table->string('alamat');
            $table->boolean('tampilkan_di_landing')->default(false);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};