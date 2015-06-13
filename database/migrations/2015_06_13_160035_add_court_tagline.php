<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourtTagline extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('courts', function (BluePrint $table) {
            $table->string('tagline')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('courts', function (BluePrint $table) {
        	$table->dropColumn('tagline');
        });
    }
}
