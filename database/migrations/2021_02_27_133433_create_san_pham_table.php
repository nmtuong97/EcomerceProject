<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('san_pham_id')->autoIncrement()->comment('id sản phẩm');
			$table->string('san_pham_ma', 50)->comment('mã sản phẩm');
			$table->string('san_pham_ten', 250)->comment('tên sản phẩm (không dấu)');
			$table->string('san_pham_ten_vn', 250)->comment('tên sản phẩm');
			$table->string('san_pham_ten_en', 250)->nullable()->comment('tên sản phẩm tiếng anh');
			$table->decimal('san_pham_gia_goc', 16)->unsigned()->comment('giá gốc sản phẩm');
			$table->decimal('san_pham_gia_ban', 16)->unsigned()->comment('giá bán sản phẩm');
			$table->string('san_pham_hinh_anh', 250)->comment('ảnh đại diện sản phẩm');
			$table->text('san_pham_mo_ta', 65535)->nullable()->comment('mô tả chi tiết sản phẩm');
			$table->unsignedTinyInteger('san_pham_trang_thai')->comment('trạng thái sản phẩm: 1:khả dụng, 2: khóa');
			$table->timestamp('san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unsignedTinyInteger('loai_san_pham_id')->index('san_pham_loai_san_pham_id_foreign')->comment('id loại sản phẩm');
			$table->unsignedTinyInteger('nsx_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('san_pham');
	}

}
