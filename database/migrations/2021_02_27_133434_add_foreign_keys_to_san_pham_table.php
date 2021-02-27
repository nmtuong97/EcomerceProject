<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('san_pham', function(Blueprint $table)
		{
			$table->foreign('loai_san_pham_id')->references('loai_san_pham_id')->on('loai_san_pham')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('san_pham', function(Blueprint $table)
		{
			$table->dropForeign('san_pham_loai_san_pham_id_foreign');
		});
	}

}
