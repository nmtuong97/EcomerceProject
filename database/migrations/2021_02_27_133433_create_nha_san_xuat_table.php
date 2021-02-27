<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNhaSanXuatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nha_san_xuat', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('nsx_id')->autoIncrement();
			$table->string('nsx_ma', 50);
			$table->string('nsx_ten', 250);
			$table->string('nsx_ten_vn', 250);
			$table->string('nsx_ten_en', 250)->nullable();
			$table->timestamp('nsx_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('nsx_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nha_san_xuat');
	}

}
