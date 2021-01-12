<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonViVanChuyenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('don_vi_van_chuyen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('don_vi_van_chuyen_id')->autoIncrement();
            $table->string('don_vi_van_chuyen_ma', 50);
            $table->string('don_vi_van_chuyen_ten', 250);
            $table->string('don_vi_van_chuyen_ten_vn', 250);
            $table->string('don_vi_van_chuyen_ten_en', 250);
            $table->unsignedDecimal('don_vi_van_chuyen_gia_goc')->comment('lưu giá gốc');
            $table->unsignedDecimal('don_vi_van_chuyen_gia')->comment('lưu giá tính với khách hàng');
            $table->timestamp('don_vi_van_chuyen_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('don_vi_van_chuyen_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('don_vi_van_chuyen');
    }
}
