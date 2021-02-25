<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKichThuocSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('kich_thuoc_san_pham', function(Blueprint $table)
		{
			$table->foreign('kich_thuoc_id')->references('kich_thuoc_id')->on('kich_thuoc')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('kich_thuoc_san_pham', function(Blueprint $table)
		{
			$table->dropForeign('kich_thuoc_san_pham_kich_thuoc_id_foreign');
			$table->dropForeign('kich_thuoc_san_pham_san_pham_id_foreign');
		});
	}

}
