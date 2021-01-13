<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKichThuocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kich_thuoc', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('kich_thuoc_id')->autoIncrement();
            $table->string('kich_thuoc_ma', 50);
            $table->string('kich_thuoc_ten', 250);
            $table->string('kich_thuoc_ten_vn', 250);
            $table->string('kich_thuoc_ten_en', 250);
            $table->string('kich_thuoc_dien_giai', 250);
            $table->timestamp('kich_thuoc_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('kich_thuoc_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kich_thuoc');
    }
}
