<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlayerModel extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('players', function (BluePrint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')
                ->unique();
            $table->string('password', 60);
            $table->string('profile_photo')
                ->nullable();
            $table->rememberToken();
            $table->unsignedInteger('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('players');
    }
}
