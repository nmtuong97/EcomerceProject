<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamHinhAnhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham_hinh_anh', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('san_pham_hinh_anh_id')->autoIncrement();
        $table->unsignedTinyInteger('san_pham_id');
        $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->string('san_pham_hinh_anh_ten', 250);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham_hinh_anh');
    }
}
