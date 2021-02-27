<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateXuatKhoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('xuat_kho', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('xuat_kho_id')->autoIncrement();
			$table->unsignedTinyInteger('don_hang_id')->index('xuat_kho_don_hang_id_foreign');
			$table->decimal('xuat_kho_tong_so_tien')->unsigned();
			$table->timestamp('xuat_kho_ngay_xuat')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('xuat_kho_ghi_chu');
			$table->unsignedTinyInteger('nhan_vien_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('xuat_kho');
	}

}
