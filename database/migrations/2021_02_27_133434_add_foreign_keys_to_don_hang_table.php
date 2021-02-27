<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDonHangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('don_hang', function(Blueprint $table)
		{
			$table->foreign('don_vi_van_chuyen_id')->references('don_vi_van_chuyen_id')->on('don_vi_van_chuyen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('khach_hang_id')->references('khach_hang_id')->on('khach_hang')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('don_hang', function(Blueprint $table)
		{
			$table->dropForeign('don_hang_don_vi_van_chuyen_id_foreign');
			$table->dropForeign('don_hang_khach_hang_id_foreign');
		});
	}

}
