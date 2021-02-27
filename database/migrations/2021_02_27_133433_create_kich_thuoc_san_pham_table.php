<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKichThuocSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kich_thuoc_san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('kich_thuoc_san_pham_id')->autoIncrement();
			$table->unsignedTinyInteger('kich_thuoc_id')->index('kich_thuoc_san_pham_kich_thuoc_id_foreign');
			$table->unsignedTinyInteger('san_pham_id')->index('kich_thuoc_san_pham_san_pham_id_foreign');
			$table->timestamp('kich_thuoc_san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('kich_thuoc_san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kich_thuoc_san_pham');
	}

}
