<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirTransportDataTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('air_transport_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->float('number_of_domestic_registered_airlines')->nullable();
            $table->float('number_of_international_registered_airlines')->nullable();
            $table->float('number_of_domestic_deregistered_airlines')->nullable();
            $table->float('number_of_international_deregistered_airlines')->nullable();
            $table->float('number_of_near_accidents')->nullable();
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
        Schema::drop('air_transport_data');
    }
}
