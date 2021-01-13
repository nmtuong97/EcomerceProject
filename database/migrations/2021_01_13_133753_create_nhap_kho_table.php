<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhap_kho', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('nhap_kho_id')->autoIncrement();
        $table->unsignedTinyInteger('nhan_vien_id');
        $table->unsignedTinyInteger('ly_do_id');
        $table->string('nhap_kho_ma', 255);
        $table->unsignedTinyInteger('ncc_id');
        $table->unsignedDecimal('nhap_kho_tong_so_tien');
        $table->string('nhap_kho_ghi_chu', 255);
        $table->timestamp('nhap_kho_ngay_nhap')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->foreign('ncc_id')->references('ncc_id')->on('nha_cung_cap')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->foreign('nhan_vien_id')->references('nhan_vien_id')->on('nhan_vien')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->foreign('ly_do_id')->references('ly_do_id')->on('ly_do')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhap_kho');
    }
}
