<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChudesanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chu_de_san_pham', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('chu_de_san_pham_id')->autoIncrement();
        $table->unsignedTinyInteger('chu_de_id');
        $table->foreign('chu_de_id')->references('chu_de_id')->on('chu_de')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->unsignedTinyInteger('san_pham_id');
        $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        
        $table->timestamp('chu_de_san_pham_tao_moi')->default(DB::raw('CURRENT_TIMESTAMP'));
        $table->timestamp('chu_de_san_pham_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chu_de_san_pham');
    }
}
