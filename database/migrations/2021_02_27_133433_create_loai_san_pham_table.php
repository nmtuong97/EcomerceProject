<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoaiSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('loai_san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('loai_san_pham_id')->autoIncrement()->comment('id');
			$table->string('loai_san_pham_ma', 50)->comment('Mã loại sản phẩm');
			$table->string('loai_san_pham_ten', 250)->comment('Tên loại # Tên loại sản phẩm (không dấu)');
			$table->string('loai_san_pham_ten_vn', 250)->comment('Tên loại # Tên loại sản phẩm (có dấu)');
			$table->string('loai_san_pham_ten_en', 250)->nullable()->comment('Tên loại # Tên loại sản phẩm (tiếng anh)');
			$table->timestamp('loai_san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo loại sản phẩm');
			$table->timestamp('loai_san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật loại sản phẩm gần nhất');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('loai_san_pham');
	}

}
