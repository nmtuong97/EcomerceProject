<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKhuyenMaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('khuyen_mai', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('khuyen_mai_id')->autoIncrement();
			$table->unsignedTinyInteger('san_pham_id')->index('khuyen_mai_san_pham_id_foreign');
			$table->decimal('khuyen_mai_pham_tram')->unsigned();
			$table->decimal('khuyen_mai_so_tien')->unsigned();
			$table->timestamp('khuyen_mai_tu_ngay')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('khuyen_mai_den_ngay')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('khuyen_mai_trang_thai')->unsigned()->comment('1 sử dụng, 2 không sử dụng');
			$table->timestamp('khuyen_mai_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('khuyen_mai_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('khuyen_mai');
	}

}
