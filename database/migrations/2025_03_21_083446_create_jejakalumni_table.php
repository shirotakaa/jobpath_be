<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJejakalumniTable extends Migration
{
    public function up()
    {
        Schema::create('jejakalumni', function (Blueprint $table) {
            $table->id('id_jejak_alumni'); // Primary Key
            $table->string('foto', 255)->nullable(); // URL foto
            $table->string('nama', 100); // Nama alumni
            $table->string('nis', 20); // NIS alumni
            $table->string('jurusan', 100); // Jurusan alumni
            $table->string('instagram', 255)->nullable(); // Link Instagram
            $table->string('linkedin', 255)->nullable(); // Link LinkedIn
            $table->timestamps(); // created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('jejakalumni');
    }
}