<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadTrafficCrashesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_traffic_crashes', function (Blueprint $table) {
            $table->increments('id');
            $table->float('fatal_cases')->nullable();
            $table->float('serious_cases')->nullable();
            $table->float('minor_cases')->nullable();
            $table->float('total_cases')->nullable();
            $table->float('persons_injured')->nullable();
            $table->float('total_casualty')->nullable();
            $table->integer('year');
            $table->float('persons_killed')->nullable();
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
        Schema::drop('road_traffic_crashes');
    }
}
