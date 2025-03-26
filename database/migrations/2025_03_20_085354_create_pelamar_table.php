<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id('id_pelamar');
            $table->unsignedBigInteger('id_pekerjaan');
            $table->unsignedBigInteger('id_perusahaan');
            $table->unsignedBigInteger('id_siswa');
            $table->string('cv', 255);
            $table->text('kelanjutan');
            $table->enum('status_lamaran', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaan')->onDelete('cascade');
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
