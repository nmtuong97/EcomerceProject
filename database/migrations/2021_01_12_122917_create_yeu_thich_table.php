<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYeuThichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeu_thich', function (Blueprint $table) {
        $table->engine = 'InnoDB';
        $table->unsignedTinyInteger('yeu_thich_id')->autoIncrement();
        $table->unsignedTinyInteger('khach_hang_id');
        $table->foreign('khach_hang_id')->references('khach_hang_id')->on('khach_hang')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->unsignedTinyInteger('san_pham_id');
        $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        $table->timestamp('yeu_thich_them_moi');
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yeu_thich');
    }
}
