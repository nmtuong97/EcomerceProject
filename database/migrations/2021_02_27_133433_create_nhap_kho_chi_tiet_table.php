<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNhapKhoChiTietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nhap_kho_chi_tiet', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('nhap_kho_chi_tiet_id')->autoIncrement();
			$table->unsignedTinyInteger('nhap_kho_id')->index('nhap_kho_chi_tiet_nhap_kho_id_foreign');
			$table->unsignedTinyInteger('san_pham_id')->index('nhap_kho_chi_tiet_san_pham_id_foreign');
			$table->decimal('nhap_kho_chi_tiet_so_luong')->unsigned();
			$table->decimal('nhap_kho_chi_tiet_don_gia')->unsigned();
			$table->decimal('nhap_kho_chi_tiet_thanh_tien')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nhap_kho_chi_tiet');
	}

}
