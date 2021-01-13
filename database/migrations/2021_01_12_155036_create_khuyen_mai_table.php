<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhuyenMaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khuyen_mai', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('khuyen_mai_id')->autoIncrement();
        $table->unsignedTinyInteger('san_pham_id');
        $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->unsignedDecimal('khuyen_mai_pham_tram');
        $table->unsignedDecimal('khuyen_mai_so_tien');
        $table->timestamp('khuyen_mai_tu_ngay')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('khuyen_mai_den_ngay')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->unsignedInteger('khuyen_mai_trang_thai')->comment('1 sử dụng, 2 không sử dụng');
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
        Schema::dropIfExists('khuyen_mai');
    }
}
