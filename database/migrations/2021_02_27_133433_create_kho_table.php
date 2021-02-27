<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKhoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kho', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('kho_id')->autoIncrement();
			$table->unsignedTinyInteger('san_pham_id')->index('kho_san_pham_id_foreign');
			$table->integer('kho_so_luong')->unsigned();
			$table->timestamp('kho_ngay_nhap_gan_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('kho_ngay_xuat_gan_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kho');
	}

}
