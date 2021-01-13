<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapKhoChiTietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhap_kho_chi_tiet', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('nhap_kho_chi_tiet_id')->autoIncrement();
            $table->unsignedTinyInteger('nhap_kho_id');
            $table->unsignedTinyInteger('san_pham_id');
            $table->unsignedDecimal('nhap_kho_chi_tiet_so_luong');
            $table->unsignedDecimal('nhap_kho_chi_tiet_don_gia');
            $table->unsignedDecimal('nhap_kho_chi_tiet_thanh_tien');
            $table->foreign('nhap_kho_id')->references('nhap_kho_id')->on('nhap_kho')->onDelete('RESTRICT')->onUpdate('RESTRICT');
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
        Schema::dropIfExists('nhap_kho_chi_tiet');
    }
}
