<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToNhaCungCapSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('nha_cung_cap_san_pham', function(Blueprint $table)
		{
			$table->foreign('ncc_id')->references('ncc_id')->on('nha_cung_cap')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('nha_cung_cap_san_pham', function(Blueprint $table)
		{
			$table->dropForeign('nha_cung_cap_san_pham_ncc_id_foreign');
			$table->dropForeign('nha_cung_cap_san_pham_san_pham_id_foreign');
		});
	}

}
