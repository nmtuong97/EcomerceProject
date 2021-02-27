<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXuatKhoChiTietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xuat_kho_chi_tiet', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('xuat_kho_chi_tiet_id')->autoIncrement();
			$table->unsignedTinyInteger('xuat_kho_id')->index('xuat_kho_chi_tiet_xuat_kho_id_foreign');
			$table->unsignedTinyInteger('san_pham_id')->index('xuat_kho_chi_tiet_san_pham_id_foreign');
			$table->decimal('xuat_kho_chi_tiet_so_luong')->unsigned();
			$table->decimal('xuat_kho_chi_tiet_don_gia')->unsigned();
			$table->decimal('xuat_kho_chi_tiet_thanh_tien')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xuat_kho_chi_tiet');
	}

}
