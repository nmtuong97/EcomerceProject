<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToXuatKhoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('xuat_kho', function(Blueprint $table)
		{
			$table->foreign('don_hang_id')->references('don_hang_id')->on('don_hang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('xuat_kho', function(Blueprint $table)
		{
			$table->dropForeign('xuat_kho_don_hang_id_foreign');
		});
	}

}
