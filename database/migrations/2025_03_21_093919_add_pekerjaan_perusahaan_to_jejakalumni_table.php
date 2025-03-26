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
            $table->string('pekerjaan')->after('jurusan');
            $table->string('perusahaan')->after('pekerjaan');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending')->after('linkedin'); // Tambahkan kolom status
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('jejakalumni', function (Blueprint $table) {
            $table->dropColumn(['pekerjaan', 'perusahaan', 'status']); // Hapus kolom status saat rollback
        });
    }
};
