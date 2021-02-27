<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMauSacSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mau_sac_san_pham', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('mau_sac_san_pham_id')->autoIncrement();
			$table->unsignedTinyInteger('mau_sac_id')->index('mau_sac_fk');
			$table->unsignedTinyInteger('san_pham_id')->index('san_pham_fk');
			$table->timestamp('mau_sac_san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('mau_sac_san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mau_sac_san_pham');
	}

}
