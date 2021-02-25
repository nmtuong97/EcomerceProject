<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYeuThichTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yeu_thich', function(Blueprint $table)
		{
			$table->boolean('yeu_thich_id')->primary();
			$table->boolean('khach_hang_id')->index('yeu_thich_khach_hang_id_foreign');
			$table->boolean('san_pham_id')->index('yeu_thich_san_pham_id_foreign');
			$table->timestamp('yeu_thich_them_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('yeu_thich');
	}

}
