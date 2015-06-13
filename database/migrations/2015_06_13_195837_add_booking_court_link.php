<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBookingCourtLink extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (BluePrint $table) {
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
        Schema::table('bookings', function (BluePrint $table) {
            $table->dropForeign('bookings_court_id_foreign');
        	$table->dropColumn('court_id');
        });
    }
}
