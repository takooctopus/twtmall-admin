<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeedssTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needss', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->integer('category_id');
            $table->integer('category_s_id');
            $table->string('name');
            $table->text('detail');
            $table->tinyInteger('campus');
            $table->string('location');
            $table->integer('price');
            $table->string('exchange');
            $table->string('phone');
            $table->string('wechat');
            $table->string('qq');
            $table->dateTime('time');
            $table->integer('show');
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
        Schema::drop('needss');
    }
}
