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
            $table->bigInteger('fatal_cases');
            $table->bigInteger('serious_cases');
            $table->bigInteger('minor_cases');
            $table->bigInteger('total_cases');
            $table->bigInteger('persons_injured');
            $table->bigInteger('total_casualty');
            $table->integer('year');
            $table->bigInteger('persons_killed');
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
