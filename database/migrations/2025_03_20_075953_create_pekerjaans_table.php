<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id('id_pekerjaan');
            $table->unsignedBigInteger('id_perusahaan');
            $table->string('judul_pekerjaan', 100);
            $table->date('deadline')->nullable(); // Nullable agar tidak error jika tidak diisi
            $table->string('lokasi', 100);
            $table->string('kategori', 30);
            $table->string('rentang_gaji', 50);
            $table->string('about_job', 255);
            $table->text('detail_pekerjaan');
            $table->enum('status', ['Pending', 'Available', 'Expired']);
            $table->enum('verifikasi', ['Pending', 'Approved', 'Rejected']);
            $table->timestamps();

            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pekerjaan');
    }
};
