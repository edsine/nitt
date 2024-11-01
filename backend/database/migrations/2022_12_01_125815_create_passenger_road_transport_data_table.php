<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerRoadTransportDataTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_road_transport_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->float('number_of_passengers_carried')->nullable();
            $table->float('number_of_vehicles_in_fleet')->nullable();
            $table->float('revenue_from_operation')->nullable();
            $table->float('number_of_employees')->nullable();
            $table->float('annual_cost_of_vehicle_maintenance')->nullable();
            $table->float('number_of_accidents')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('passenger_road_transport_data');
    }
}
