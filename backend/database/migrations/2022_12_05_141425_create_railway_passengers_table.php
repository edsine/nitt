<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRailwayPassengersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('railway_passengers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->float('number_of_urban_passengers_carried')->nullable();
            $table->float('number_of_regional_passengers_carried')->nullable();
            $table->float('freight_carried')->nullable();
            $table->float('number_of_freight_trains')->nullable();
            $table->float('number_of_passenger_trains')->nullable();
            $table->float('freight_revenue_generation')->nullable();
            $table->float('passenger_revenue_generation')->nullable();
            $table->float('passenger_fuel_consumption_rate')->nullable();
            $table->float('freight_fuel_consumption_rate')->nullable();
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
        Schema::drop('railway_passengers');
    }
}
