<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToXuatKhoChiTietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('xuat_kho_chi_tiet', function(Blueprint $table)
		{
			$table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('xuat_kho_id')->references('xuat_kho_id')->on('xuat_kho')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('xuat_kho_chi_tiet', function(Blueprint $table)
		{
			$table->dropForeign('xuat_kho_chi_tiet_san_pham_id_foreign');
			$table->dropForeign('xuat_kho_chi_tiet_xuat_kho_id_foreign');
		});
	}

}
