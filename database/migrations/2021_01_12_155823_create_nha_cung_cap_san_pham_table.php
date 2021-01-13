<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhaCungCapSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_cung_cap_san_pham', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('nha_cung_cap_san_pham_id')->autoIncrement();
        $table->unsignedTinyInteger('ncc_id');
        $table->foreign('ncc_id')->references('ncc_id')->on('nha_cung_cap')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->unsignedTinyInteger('san_pham_id');
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
        Schema::dropIfExists('nha_cung_cap_san_pham');
    }
}
