<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMauSacSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('mau_sac_san_pham', function(Blueprint $table)
		{
			$table->foreign('mau_sac_id', 'mau_sac_fk')->references('mau_sac_id')->on('mau_sac')->onUpdate('CASCADE')->onDelete('RESTRICT');
			$table->foreign('san_pham_id', 'san_pham_fk')->references('san_pham_id')->on('san_pham')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('mau_sac_san_pham', function(Blueprint $table)
		{
			$table->dropForeign('mau_sac_fk');
			$table->dropForeign('san_pham_fk');
		});
	}

}
