<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGioHangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gio_hang', function(Blueprint $table)
		{
			$table->boolean('gio_hang_id')->primary();
			$table->boolean('khach_hang_id')->index('gio_hang_khach_hang_id_foreign');
			$table->boolean('san_pham_id')->index('gio_hang_san_pham_id_foreign');
			$table->integer('gio_hang_so_luong')->unsigned();
			$table->timestamp('gio_hang_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gio_hang');
	}

}
