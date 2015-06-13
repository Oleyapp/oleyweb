<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourtModel extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('courts', function (BluePrint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo_image')
            	->nullable();
            $table->string('background_image')
            	->nullable();
            $table->string('address')
            	->nullable();
            $table->unsignedInteger('type')
            	->nullable();
            $table->decimal('longitude', 9, 6)
            	->nullable();
			$table->decimal('latitude', 9, 6)
				->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('courts');
    }
}
