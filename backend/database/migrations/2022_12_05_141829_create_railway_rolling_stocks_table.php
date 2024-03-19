<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRailwayRollingStocksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('railway_rolling_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('number_of_coaches_rolling_stock')->nullable();
            $table->bigInteger('number_of_wagon_rolling_stock')->nullable();
            $table->bigInteger('average_loco_availability')->nullable();
            $table->bigInteger('average_coaches_maintenance_cost')->nullable();
            $table->bigInteger('average_wagon_maintenance_cost')->nullable();
            $table->bigInteger('annual_average_km_travel_coaches')->nullable();
            $table->bigInteger('annual_average_km_travel_wagon')->nullable();
            $table->integer('year')->unique();
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
        Schema::drop('railway_rolling_stocks');
    }
}
