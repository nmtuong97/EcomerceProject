<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColIntoTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->unsignedTinyInteger('khach_hang_id');
            $table->unsignedTinyInteger('nhan_vien_id');
            $table->foreign('nhan_vien_id')->references('nhan_vien_id')->on('nhan_vien')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropForeign(['khach_hang_id']);
            $table->dropColumn('khach_hang_id');
            $table->dropForeign(['nhan_vien_id']);
            $table->dropColumn('nhan_vien_id');
        });
    }
}
