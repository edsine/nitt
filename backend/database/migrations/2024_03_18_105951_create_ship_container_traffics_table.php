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
            $table->float('ship_traffic', 30, 2)->nullable();
            $table->float('container_traffic', 30, 2)->nullable();
            $table->float('cargo_throughput', 30, 2)->nullable();
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
