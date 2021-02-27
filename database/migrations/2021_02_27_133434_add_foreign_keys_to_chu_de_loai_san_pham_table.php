<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChuDeLoaiSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chu_de_loai_san_pham', function(Blueprint $table)
		{
			$table->foreign('chu_de_id')->references('chu_de_id')->on('chu_de')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('chu_de_loai_san_pham', function(Blueprint $table)
		{
			$table->dropForeign('chu_de_loai_san_pham_chu_de_id_foreign');
			$table->dropForeign('chu_de_loai_san_pham_loai_san_pham_id_foreign');
		});
	}

}
