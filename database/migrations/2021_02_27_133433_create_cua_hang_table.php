<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuaHangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cua_hang', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('cua_hang_id')->autoIncrement();
			$table->string('cua_hang_ten', 250);
			$table->string('cua_hang_dia_chi', 250);
			$table->string('cua_hang_email', 250);
			$table->string('cua_hang_sdt_1', 250);
			$table->string('cua_hang_sdt_2', 250);
			$table->string('cua_hang_ma_so_doanh_nghiep', 250);
			$table->timestamp('cua_hang_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('cua_hang_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cua_hang');
	}

}
