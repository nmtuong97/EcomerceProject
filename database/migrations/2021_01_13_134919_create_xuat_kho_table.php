<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXuatKhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuat_kho', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('xuat_kho_id')->autoIncrement();
            $table->unsignedTinyInteger('don_hang_id');
            $table->unsignedDecimal('xuat_kho_tong_so_tien');
            $table->timestamp('xuat_kho_ngay_xuat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('xuat_kho_ghi_chu', 255);
            $table->unsignedTinyInteger('nhan_vien_id');
            $table->foreign('don_hang_id')->references('don_hang_id')->on('don_hang')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuat_kho');
    }
}
