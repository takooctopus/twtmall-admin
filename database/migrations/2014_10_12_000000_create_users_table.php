<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('campus');
            $table->string('username');
            $table->string('stunumber');
            $table->string('phone');
            $table->string('wechat');
            $table->string('qq');
            $table->integer('imgurl');
            $table->string('token');
            $table->string('email');
            $table->integer('praise');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
