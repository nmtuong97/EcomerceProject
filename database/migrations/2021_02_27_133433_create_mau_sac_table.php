<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMauSacTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mau_sac', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('mau_sac_id')->autoIncrement();
			$table->string('mau_sac_ma', 50);
			$table->string('mau_sac_ten', 250);
			$table->string('mau_sac_ten_vn', 250);
			$table->string('mau_sac_ten_en', 250)->nullable();
			$table->timestamp('mau_sac_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('mau_sac_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mau_sac');
	}

}
