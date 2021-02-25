<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDonHangChiTietTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('don_hang_chi_tiet', function(Blueprint $table)
		{
			$table->foreign('don_hang_id')->references('don_hang_id')->on('don_hang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('kich_thuoc_id')->references('kich_thuoc_id')->on('kich_thuoc')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('mau_sac_id')->references('mau_sac_id')->on('mau_sac')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('don_hang_chi_tiet', function(Blueprint $table)
		{
			$table->dropForeign('don_hang_chi_tiet_don_hang_id_foreign');
			$table->dropForeign('don_hang_chi_tiet_kich_thuoc_id_foreign');
			$table->dropForeign('don_hang_chi_tiet_mau_sac_id_foreign');
			$table->dropForeign('don_hang_chi_tiet_san_pham_id_foreign');
		});
	}

}
