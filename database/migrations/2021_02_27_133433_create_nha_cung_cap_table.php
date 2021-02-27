<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNhaCungCapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nha_cung_cap', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('ncc_id')->autoIncrement();
			$table->string('ncc_ma', 50);
			$table->string('ncc_ten', 250);
			$table->string('ncc_ten_vn', 250);
			$table->string('ncc_ten_en', 250)->nullable();
			$table->timestamp('ncc_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('ncc_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nha_cung_cap');
	}

}
