<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthToken extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('auth_tokens', function (BluePrint $table) {
            $table->increments('id');
            $table->string('token');
            $table->unsignedInteger('player_id');
            $table->timestamps();

            $table->foreign('player_id')
				->references('id')
				->on('players')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('auth_tokens');
    }
}
