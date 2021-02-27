<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonHangChiTietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('don_hang_chi_tiet', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('don_hang_chi_tiet_id')->autoIncrement();
			$table->unsignedTinyInteger('don_hang_id')->index('don_hang_chi_tiet_don_hang_id_foreign');
			$table->unsignedTinyInteger('san_pham_id')->index('don_hang_chi_tiet_san_pham_id_foreign');
			$table->unsignedTinyInteger('mau_sac_id')->index('don_hang_chi_tiet_mau_sac_id_foreign');
			$table->unsignedTinyInteger('kich_thuoc_id')->index('don_hang_chi_tiet_kich_thuoc_id_foreign');
			$table->integer('don_hang_chi_tiet_so_luong')->unsigned()->comment('số lượng sản phẩm');
			$table->decimal('don_hang_chi_tiet_don_gia')->unsigned()->comment('đơn giá sản phẩm (tính tại thời điểm mua hàng)');
			$table->decimal('don_hang_chi_tiet_thanh_tien')->unsigned()->comment('thành tiền = đơn giá * số lượng');
			$table->timestamp('don_hang_chi_tiet_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('don_hang_chi_tiet_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('don_hang_chi_tiet');
	}

}
