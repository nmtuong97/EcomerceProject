<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGioHangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('gio_hang', function(Blueprint $table)
		{
			$table->foreign('khach_hang_id')->references('khach_hang_id')->on('khach_hang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('gio_hang', function(Blueprint $table)
		{
			$table->dropForeign('gio_hang_khach_hang_id_foreign');
			$table->dropForeign('gio_hang_san_pham_id_foreign');
		});
	}

}
