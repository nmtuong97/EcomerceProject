<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNhapKhoChiTietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nhap_kho_chi_tiet', function(Blueprint $table)
		{
			$table->foreign('nhap_kho_id')->references('nhap_kho_id')->on('nhap_kho')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nhap_kho_chi_tiet', function(Blueprint $table)
		{
			$table->dropForeign('nhap_kho_chi_tiet_nhap_kho_id_foreign');
			$table->dropForeign('nhap_kho_chi_tiet_san_pham_id_foreign');
		});
	}

}
