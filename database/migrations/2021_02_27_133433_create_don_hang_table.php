<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonHangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('don_hang', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('don_hang_id')->autoIncrement();
			$table->string('don_hang_ma');
			$table->unsignedTinyInteger('khach_hang_id')->index('don_hang_khach_hang_id_foreign')->comment('id bảng khách hàng');
			$table->unsignedTinyInteger('don_vi_van_chuyen_id')->index('don_hang_don_vi_van_chuyen_id_foreign')->comment('id đơn vị vận chuyển');
			$table->decimal('don_hang_tong_tien_san_pham')->unsigned()->comment('tổng tiền của sản phẩm');
			$table->decimal('don_hang_so_tien_van_chuyen')->unsigned()->comment('tổng tiền vận chuyển');
			$table->decimal('don_hang_tong_so_tien')->unsigned()->comment('tổng tiền sản phẩm + tiền vận chuyển');
			$table->string('don_hang_ghi_chu', 4000)->comment('ghi chú của khách hàng');
			$table->timestamp('don_hang_ngay_mua')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('don_hang');
	}

}
