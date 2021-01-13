<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonHangChiTietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_hang_chi_tiet', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('don_hang_chi_tiet_id')->autoIncrement();
            $table->unsignedTinyInteger('don_hang_id');
            $table->unsignedTinyInteger('san_pham_id');
            $table->unsignedTinyInteger('mau_sac_id');
            $table->unsignedTinyInteger('kich_thuoc_id');
            $table->unsignedInteger('don_hang_chi_tiet_so_luong')->comment('số lượng sản phẩm');
            $table->unsignedDecimal('don_hang_chi_tiet_don_gia')->comment('đơn giá sản phẩm (tính tại thời điểm mua hàng)');
            $table->unsignedDecimal('don_hang_chi_tiet_thanh_tien')->comment('thành tiền = đơn giá * số lượng');
            $table->timestamp('don_hang_chi_tiet_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('don_hang_chi_tiet_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('kich_thuoc_id')->references('kich_thuoc_id')->on('kich_thuoc')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('mau_sac_id')->references('mau_sac_id')->on('mau_sac')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
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
        Schema::dropIfExists('don_hang_chi_tiet');
    }
}
