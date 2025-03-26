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
        Schema::create('perusahaan_content', function (Blueprint $table) {
            $table->id();
            $table->string('asset_1')->nullable();
            $table->string('asset_2')->nullable();
            $table->string('asset_3')->nullable();
            $table->string('judul_perusahaan');
            $table->string('subtitle_perusahaan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan_content');
    }
};
