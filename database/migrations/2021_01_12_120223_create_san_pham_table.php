<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('san_pham_id')->autoIncrement()->comment('id sản phẩm');
            $table->string('san_pham_ma', 50)->comment('mã sản phẩm');
            $table->string('san_pham_ten', 250)->comment('tên sản phẩm (không dấu)');
            $table->string('san_pham_ten_vn', 250)->comment('tên sản phẩm');
            $table->string('san_pham_ten_en', 250)->comment('tên sản phẩm tiếng anh');
            $table->unsignedDecimal('san_pham_gia_goc')->comment('giá gốc sản phẩm');
            $table->unsignedDecimal('san_pham_gia_ban')->comment('giá bán sản phẩm');
            $table->string('san_pham_hinh_anh', 250)->comment('ảnh đại diện sản phẩm');
            $table->text('san_pham_mo_ta')->comment('mô tả chi tiết sản phẩm');
            $table->unsignedTinyInteger('san_pham_trang_thai')->comment('trạng thái sản phẩm: 1:khả dụng, 2: khóa');
            $table->timestamp('san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedTinyInteger('loai_san_pham_id')->comment('id loại sản phẩm');
            $table->unsignedTinyInteger('nsx_id')->comment('id nhà sản xuất');
            $table->foreign('loai_san_pham_id')->references('loai_san_pham_id')->on('loai_san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('nsx_id')->references('nsx_id')->on('nha_san_xuat')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
