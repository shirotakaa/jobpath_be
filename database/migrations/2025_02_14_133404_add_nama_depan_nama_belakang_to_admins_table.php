<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->string('nama_depan')->nullable()->after('username');
            $table->string('nama_belakang')->nullable()->after('nama_depan');
        });
    }

    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn(['nama_depan', 'nama_belakang']);
        });
    }
};
