<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSanPhamHinhAnhTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('san_pham_hinh_anh', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('san_pham_hinh_anh_id')->autoIncrement();
			$table->unsignedTinyInteger('san_pham_id')->index('san_pham_hinh_anh_san_pham_id_foreign');
			$table->string('san_pham_hinh_anh_ten', 250);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('san_pham_hinh_anh');
	}

}
