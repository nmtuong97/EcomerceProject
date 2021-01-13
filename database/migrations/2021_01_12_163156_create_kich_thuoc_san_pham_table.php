<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKichThuocSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kich_thuoc_san_pham', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('kich_thuoc_san_pham_id')->autoIncrement();
        $table->unsignedTinyInteger('kich_thuoc_id');
        $table->foreign('kich_thuoc_id')->references('kich_thuoc_id')->on('kich_thuoc')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->unsignedTinyInteger('san_pham_id');
        $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->timestamp('kich_thuoc_san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('kich_thuoc_san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kich_thuoc_san_pham');
    }
}
