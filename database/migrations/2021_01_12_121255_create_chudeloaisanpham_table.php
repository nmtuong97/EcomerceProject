<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChudeloaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chu_de_loai_san_pham', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('chu_de_loai_san_pham_id')->autoIncrement();
        $table->unsignedTinyInteger('chu_de_id');
        $table->foreign('chu_de_id')->references('chu_de_id')->on('chu_de')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->unsignedTinyInteger('loai_san_pham_id');
        $table->foreign('loai_san_pham_id')->references('loai_san_pham_id')->on('loai_san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chu_de_loai_san_pham');
    }
}
