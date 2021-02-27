<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToChuDeSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('chu_de_san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->foreign('chu_de_id')->references('chu_de_id')->on('chu_de')->onUpdate('RESTRICT')->onDelete('RESTRICT');
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
		Schema::table('chu_de_san_pham', function(Blueprint $table)
		{
			$table->dropForeign('chu_de_san_pham_chu_de_id_foreign');
			$table->dropForeign('chu_de_san_pham_san_pham_id_foreign');
		});
	}

}
