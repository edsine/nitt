<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporationPassengerTrafficsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporation_passenger_traffics', function (Blueprint $table) {
            $table->increments('id');
            $table->text('source');
            $table->text('destination');
            $table->integer('year');
            $table->float('count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('corporation_passenger_traffics');
    }
}
