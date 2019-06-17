<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_acess', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('last_login');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_acess');
    }
}
