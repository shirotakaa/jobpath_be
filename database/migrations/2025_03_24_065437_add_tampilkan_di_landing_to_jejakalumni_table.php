<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jejakalumni', function (Blueprint $table) {
            $table->boolean('tampilkan_di_landing')->default(false)->after('status');
        });
    }

    public function down()
    {
        Schema::table('jejakalumni', function (Blueprint $table) {
            $table->dropColumn('tampilkan_di_landing');
        });
    }
};
