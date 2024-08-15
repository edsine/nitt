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
            $table->float('number_of_coaches_rolling_stock')->nullable();
            $table->float('number_of_wagon_rolling_stock')->nullable();
            $table->float('average_loco_availability')->nullable();
            $table->float('average_coaches_maintenance_cost')->nullable();
            $table->float('average_wagon_maintenance_cost')->nullable();
            $table->float('annual_average_km_travel_coaches')->nullable();
            $table->float('annual_average_km_travel_wagon')->nullable();
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
