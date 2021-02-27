<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNhanVienTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nhan_vien', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->unsignedTinyInteger('nhan_vien_id')->autoIncrement();
			$table->string('nhan_vien_ma', 50);
			$table->string('nhan_vien_ho_lot', 250);
			$table->string('nhan_vien_ten', 250);
			$table->string('nhan_vien_ho_lot_vn', 250);
			$table->string('nhan_vien_ten_vn', 250);
			$table->string('nhan_vien_username', 50);
			$table->string('nhan_vien_mat_khau', 250);
			$table->string('nhan_vien_gioi_tinh', 1);
			$table->string('nhan_vien_dia_chi', 250);
			$table->string('nhan_vien_sdt', 15);
			$table->string('nhan_vien_email', 250);
			$table->string('nhan_vien_admin', 1)->default('0')->comment('default: 0; 1:admin; 0: nhân viên bình thường');
			$table->string('nhan_vien_hinh_anh', 250)->nullable();
			$table->timestamp('nhan_vien_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('nhan_vien_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nhan_vien');
	}

}
