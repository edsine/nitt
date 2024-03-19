<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreightRoadTransportDataTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freight_road_transport_data', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('number_of_tonnes_carried')->nullable();
            $table->integer('year')->unique();
            $table->bigInteger('number_of_vehicles_in_fleet')->nullable();
            $table->bigInteger('revenue_from_operation')->nullable();
            $table->bigInteger('number_of_employees')->nullable();
            $table->bigInteger('annual_cost_of_vehicle_maintenance')->nullable();
            $table->bigInteger('number_of_accidents')->nullable();
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
        Schema::drop('freight_road_transport_data');
    }
}
