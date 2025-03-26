<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('jejakalumni', function (Blueprint $table) {
            $table->unsignedBigInteger('id_siswa')->after('id_jejak_alumni');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('jejakalumni', function (Blueprint $table) {
            $table->dropForeign(['id_siswa']);
            $table->dropColumn('id_siswa');
        });
    }
};
