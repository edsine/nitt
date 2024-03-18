<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoadCrashCausativeFactorsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('road_crash_causative_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('state');
            $table->bigInteger('speed_violation');
            $table->bigInteger('lost_control');
            $table->bigInteger('dangerous_driving');
            $table->bigInteger('tyre_burst');
            $table->bigInteger('brake_failure');
            $table->bigInteger('wrongful_overtaking');
            $table->bigInteger('route_violation');
            $table->bigInteger('mechanically_deficient_vehicle');
            $table->bigInteger('bad_road');
            $table->bigInteger('road_obstruction_violation');
            $table->bigInteger('dangerous_overtaking');
            $table->bigInteger('overloading');
            $table->bigInteger('sleeping_on_steering');
            $table->bigInteger('driving_under_alcohol_drug');
            $table->bigInteger('use_of_phone_driving');
            $table->bigInteger('night_journey');
            $table->bigInteger('fatigue');
            $table->bigInteger('poor_weather');
            $table->bigInteger('sign_light_violation');
            $table->bigInteger('others');
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
        Schema::drop('road_crash_causative_factors');
    }
}
