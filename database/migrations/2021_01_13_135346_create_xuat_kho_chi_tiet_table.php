<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXuatKhoChiTietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuat_kho_chi_tiet', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('xuat_kho_chi_tiet_id')->autoIncrement();
            $table->unsignedTinyInteger('xuat_kho_id');
            $table->unsignedTinyInteger('san_pham_id');
            $table->unsignedDecimal('xuat_kho_chi_tiet_so_luong');
            $table->unsignedDecimal('xuat_kho_chi_tiet_don_gia');
            $table->unsignedDecimal('xuat_kho_chi_tiet_thanh_tien');
            $table->foreign('xuat_kho_id')->references('xuat_kho_id')->on('xuat_kho')->onDelete('RESTRICT')->onUpdate('RESTRICT');
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
        Schema::dropIfExists('xuat_kho_chi_tiet');
    }
}
