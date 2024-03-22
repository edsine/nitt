<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirModeDatasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_mode_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('airport');
            $table->integer('year');
            $table->float('domestic_passengers_traffic')->nullable();
            $table->float('international_passengers_traffic')->nullable();
            $table->float('aircraft_traffic_domestic')->nullable();
            $table->float('aircraft_traffic_international')->nullable();
            $table->float('cargo_traffic_domestic')->nullable();
            $table->float('cargo_traffic_international')->nullable();
            $table->float('mail_traffic_domestic')->nullable();
            $table->float('mail_traffic_international')->nullable();
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
        Schema::drop('air_mode_data');
    }
}
