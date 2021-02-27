<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSanPhamHinhAnhTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('san_pham_hinh_anh', function(Blueprint $table)
		{
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
		Schema::table('san_pham_hinh_anh', function(Blueprint $table)
		{
			$table->dropForeign('san_pham_hinh_anh_san_pham_id_foreign');
		});
	}

}
