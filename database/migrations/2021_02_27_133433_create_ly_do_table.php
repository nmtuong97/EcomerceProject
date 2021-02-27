<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLyDoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ly_do', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('ly_do_id')->autoIncrement();
			$table->string('ly_do_ma', 50);
			$table->string('ly_do_ten', 250);
			$table->string('ly_do_ten_vn', 250);
			$table->string('ly_do_ten_en', 250)->nullable();
			$table->string('ly_do_loai', 2)->comment('loại lý do # 1: nhập 2:xuất');
			$table->timestamp('ly_do_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('ly_do_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ly_do');
	}

}
