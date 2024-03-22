<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetOperatorRoadTrafficCrashesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_operator_road_traffic_crashes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fleet_operator');
            $table->float('number_of_cases')->nullable();
            $table->float('number_killed')->nullable();
            $table->float('number_injured')->nullable();
            $table->float('number_of_persons')->nullable();
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
        Schema::drop('fleet_operator_road_traffic_crashes');
    }
}
