<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuDeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chu_de', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('chu_de_id')->autoIncrement()->comment('id chủ đề');
        $table->string('chu_de_ma', 50)->comment('mã chủ đề');
        $table->string('chu_de_ten', 250)->comment('tên chủ đề (không dấu)');
        $table->string('chu_de_ten_vn', 250)->comment('tên chủ đề');
        $table->string('chu_de_ten_en', 250)->comment('tên chủ đề tiếng anh');
        $table->timestamp('chu_de_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('chu_de_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chu_de');
    }
}
