<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFaqContentTableChangeDeskripsiColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('faq_content', function (Blueprint $table) {
            $table->text('deskripsi')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('faq_content', function (Blueprint $table) {
            $table->string('deskripsi', 255)->change();
        });
    }
}