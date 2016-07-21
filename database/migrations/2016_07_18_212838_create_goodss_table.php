<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('category_id');
            $table->integer('category_s_id');
            $table->string('name');
            $table->string('detail');
            $table->tinyInteger('campus');
            $table->string('location');
            $table->integer('price');
            $table->integer('bargain');
            $table->integer('status');
            $table->string('exchange');
            $table->string('phone');
            $table->string('wechat');
            $table->string('qq');
            $table->string('imgurl');
            $table->dateTime('time');
            $table->integer('view');
            $table->tinyInteger('show');
            $table->integer('want');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('goodss');
    }
}
