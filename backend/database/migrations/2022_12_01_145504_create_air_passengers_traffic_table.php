<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirPassengersTrafficTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_passengers_traffic', function (Blueprint $table) {
            $table->increments('id');
            $table->float('domestic_passengers_traffic')->nullable();
            $table->float('international_passengers_traffic')->nullable();
            $table->float('domestic_freight_traffic')->nullable();
            $table->float('international_freight_traffic')->nullable();
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
        Schema::drop('air_passengers_traffic');
    }
}
