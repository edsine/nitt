<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipTrafficGRTsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_traffic_g_r_ts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->float('number_of_vessels')->nullable();
            $table->float('grt')->nullable();
            $table->string('port');
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
        Schema::drop('ship_traffic_g_r_ts');
    }
}
