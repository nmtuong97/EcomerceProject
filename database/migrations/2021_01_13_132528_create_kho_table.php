<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('kho_id')->autoIncrement();
            $table->unsignedTinyInteger('san_pham_id');
            $table->unsignedInteger('kho_so_luong');
            $table->timestamp('kho_ngay_nhap_gan_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kho_ngay_xuat_gan_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kho');
    }
}
