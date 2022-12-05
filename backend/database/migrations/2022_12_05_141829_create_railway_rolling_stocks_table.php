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
            $table->bigInteger('number_of_coaches_rolling_stock');
            $table->bigInteger('number_of_wagon_rolling_stock');
            $table->bigInteger('average_loco_availability');
            $table->bigInteger('average_coaches_maintenance_cost');
            $table->bigInteger('average_wagon_maintenance_cost');
            $table->bigInteger('annual_average_km_travel_coaches');
            $table->bigInteger('annual_average_km_travel_wagon');
            $table->date('year');
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
