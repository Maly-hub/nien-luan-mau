<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->bigIncrements('dh_id');
            $table->integer('dh_tongtien');
            $table->string('dh_nguoinhan');
            $table->string('dh_sdt');
            $table->string('dh_diachi');
            $table->integer('trangthai');
            //khoi tao khoa ngoai
            $table->bigInteger('kh_id')->unsigned();
            $table->foreign('kh_id')->references('kh_id')->on('khachhang')->onDelete('cascade');
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
        Schema::dropIfExists('donhang');
    }
}
