<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkUserCourt extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (BluePrint $table) {
            $table->unsignedInteger('court_id')
                ->nullable();

            $table->foreign('court_id')
                ->references('id')
                ->on('courts')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (BluePrint $table) {
            $table->dropForeign('users_court_id_foreign');
        	$table->dropColumn('column_id');
        });
    }
}
