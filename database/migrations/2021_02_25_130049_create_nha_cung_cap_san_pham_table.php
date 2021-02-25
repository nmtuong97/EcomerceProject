<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNhaCungCapSanPhamTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nha_cung_cap_san_pham', function(Blueprint $table)
		{
			$table->boolean('nha_cung_cap_san_pham_id')->primary();
			$table->boolean('ncc_id')->index('nha_cung_cap_san_pham_ncc_id_foreign');
			$table->boolean('san_pham_id')->index('nha_cung_cap_san_pham_san_pham_id_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nha_cung_cap_san_pham');
	}

}
