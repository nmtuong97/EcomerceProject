<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNhapKhoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nhap_kho', function(Blueprint $table)
		{
			$table->foreign('ly_do_id')->references('ly_do_id')->on('ly_do')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('ncc_id')->references('ncc_id')->on('nha_cung_cap')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('nhan_vien_id')->references('nhan_vien_id')->on('nhan_vien')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('nhap_kho', function(Blueprint $table)
		{
			$table->dropForeign('nhap_kho_ly_do_id_foreign');
			$table->dropForeign('nhap_kho_ncc_id_foreign');
			$table->dropForeign('nhap_kho_nhan_vien_id_foreign');
		});
	}

}
