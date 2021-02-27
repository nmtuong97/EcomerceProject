<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKhachHangTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('khach_hang', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('khach_hang_id')->autoIncrement();
			$table->string('khach_hang_ho_lot', 250);
			$table->string('khach_hang_ho_lot_vn', 250);
			$table->string('khach_hang_ten', 250);
			$table->string('khach_hang_ten_vn', 250);
			$table->string('khach_hang_gioi_tinh', 1)->comment('1 nam, 2 nữ, 3 khác');
			$table->string('khach_hang_ngay_sinh', 250);
			$table->string('khach_hang_sdt', 250);
			$table->string('khach_hang_email', 250);
			$table->string('khach_hang_dia_chi', 250);
			$table->string('khach_hang_username', 250);
			$table->string('khach_hang_password', 250);
			$table->string('khach_hang_remember_token', 250);
			$table->timestamp('khach_hang_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('khach_hang_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('khach_hang');
	}

}
