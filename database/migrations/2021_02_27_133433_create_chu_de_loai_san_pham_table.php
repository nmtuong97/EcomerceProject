<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChuDeLoaiSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chu_de_loai_san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('chu_de_loai_san_pham_id')->autoIncrement();
			$table->unsignedTinyInteger('chu_de_id')->index('chu_de_loai_san_pham_chu_de_id_foreign');
			$table->unsignedTinyInteger('loai_san_pham_id')->index('chu_de_loai_san_pham_loai_san_pham_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chu_de_loai_san_pham');
	}

}
