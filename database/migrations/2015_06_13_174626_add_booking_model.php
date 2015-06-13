<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingModel extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (BluePrint $table) {
            $table->increments('id');
            $table->unsignedInteger('player_id');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
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
        Schema::drop('bookings');
    }
}
