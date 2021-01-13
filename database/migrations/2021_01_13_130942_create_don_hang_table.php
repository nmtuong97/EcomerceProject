<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('don_hang', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('don_hang_id')->autoIncrement();
        $table->string('don_hang_ma', 255);
        $table->unsignedTinyInteger('khach_hang_id')->comment('id bảng khách hàng');
        $table->unsignedTinyInteger('don_vi_van_chuyen_id')->comment('id đơn vị vận chuyển');
        $table->unsignedDecimal('don_hang_tong_tien_san_pham')->comment('tổng tiền của sản phẩm');
        $table->unsignedDecimal('don_hang_so_tien_van_chuyen')->comment('tổng tiền vận chuyển');
        $table->unsignedDecimal('don_hang_tong_so_tien')->comment('tổng tiền sản phẩm + tiền vận chuyển');
        $table->string('don_hang_ghi_chu', 4000)->comment('ghi chú của khách hàng');
        $table->timestamp('don_hang_ngay_mua')->autoIncrement();
        $table->foreign('khach_hang_id')->references('khach_hang_id')->on('khach_hang')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->foreign('don_vi_van_chuyen_id')->references('don_vi_van_chuyen_id')->on('don_vi_van_chuyen')->onDelete('RESTRICT')->onUpdate('RESTRICT');
    }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_hang');
    }
}
