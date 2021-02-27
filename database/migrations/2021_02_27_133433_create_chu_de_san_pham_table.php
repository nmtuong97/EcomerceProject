<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChuDeSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chu_de_san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('chu_de_san_pham_id')->autoIncrement();
			$table->unsignedTinyInteger('chu_de_id')->index('chu_de_san_pham_chu_de_id_foreign');
			$table->unsignedTinyInteger('san_pham_id')->index('chu_de_san_pham_san_pham_id_foreign');
			$table->timestamp('chu_de_san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('chu_de_san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chu_de_san_pham');
	}

}
