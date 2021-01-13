<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGioHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gio_hang', function (Blueprint $table) {
        $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('gio_hang_id')->autoIncrement();
            $table->unsignedTinyInteger('khach_hang_id');
            $table->unsignedTinyInteger('san_pham_id');
            $table->unsignedInteger('gio_hang_so_luong');
            $table->timestamp('gio_hang_cap_nhat')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('khach_hang_id')->references('khach_hang_id')->on('khach_hang')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('san_pham_id')->references('san_pham_id')->on('san_pham')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gio_hang');
    }
}
