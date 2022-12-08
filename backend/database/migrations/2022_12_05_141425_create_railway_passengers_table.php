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
            $table->bigInteger('number_of_urban_passengers_carried');
            $table->bigInteger('number_of_regional_passengers_carried');
            $table->bigInteger('freight_carried');
            $table->bigInteger('number_of_freight_trains');
            $table->bigInteger('number_of_passenger_trains');
            $table->bigInteger('freight_revenue_generation');
            $table->bigInteger('passenger_revenue_generation');
            $table->bigInteger('passenger_fuel_consumption_rate');
            $table->bigInteger('freight_fuel_consumption_rate');
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
