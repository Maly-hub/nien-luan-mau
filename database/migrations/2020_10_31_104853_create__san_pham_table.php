<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $table) {
            $table->bigIncrements('sp_id');
            $table->string('sp_ten',150);
            //$table->string('sp_gia');
            //khoi tao khoa ngoai
            $table->bigInteger('l_id')->unsigned();
            $table->foreign('l_id')->references('l_id')->on('loaisanpham')->onDelete('cascade');
            $table->string('sp_hinhanh',50);
            $table->string('sp_mota',200)->nullable();
            $table->Integer('sp_gia');
            $table->Integer('sp_soluong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SanPham');
    }
}
