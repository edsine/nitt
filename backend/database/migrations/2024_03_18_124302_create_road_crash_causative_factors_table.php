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
            $table->bigInteger('speed_violation')->nullable();
            $table->bigInteger('lost_control')->nullable();
            $table->bigInteger('dangerous_driving')->nullable();
            $table->bigInteger('tyre_burst')->nullable();
            $table->bigInteger('brake_failure')->nullable();
            $table->bigInteger('wrongful_overtaking')->nullable();
            $table->bigInteger('route_violation')->nullable();
            $table->bigInteger('mechanically_deficient_vehicle')->nullable();
            $table->bigInteger('bad_road')->nullable();
            $table->bigInteger('road_obstruction_violation')->nullable();
            $table->bigInteger('dangerous_overtaking')->nullable();
            $table->bigInteger('overloading')->nullable();
            $table->bigInteger('sleeping_on_steering')->nullable();
            $table->bigInteger('driving_under_alcohol_drug')->nullable();
            $table->bigInteger('use_of_phone_driving')->nullable();
            $table->bigInteger('night_journey')->nullable();
            $table->bigInteger('fatigue')->nullable();
            $table->bigInteger('poor_weather')->nullable();
            $table->bigInteger('sign_light_violation')->nullable();
            $table->bigInteger('others')->nullable();
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
