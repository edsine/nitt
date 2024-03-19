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
            $table->bigInteger('fatal_cases')->nullable();
            $table->bigInteger('serious_cases')->nullable();
            $table->bigInteger('minor_cases')->nullable();
            $table->bigInteger('total_cases')->nullable();
            $table->bigInteger('persons_injured')->nullable();
            $table->bigInteger('total_casualty')->nullable();
            $table->integer('year');
            $table->bigInteger('persons_killed')->nullable();
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
