<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipContainerTrafficsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_container_traffics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->bigInteger('ship_traffic')->nullable();
            $table->bigInteger('container_traffic')->nullable();
            $table->bigInteger('cargo_throughput')->nullable();
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
        Schema::drop('ship_container_traffics');
    }
}
