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
            $table->float('speed_violation')->nullable();
            $table->float('lost_control')->nullable();
            $table->float('dangerous_driving')->nullable();
            $table->float('tyre_burst')->nullable();
            $table->float('brake_failure')->nullable();
            $table->float('wrongful_overtaking')->nullable();
            $table->float('route_violation')->nullable();
            $table->float('mechanically_deficient_vehicle')->nullable();
            $table->float('bad_road')->nullable();
            $table->float('road_obstruction_violation')->nullable();
            $table->float('dangerous_overtaking')->nullable();
            $table->float('overloading')->nullable();
            $table->float('sleeping_on_steering')->nullable();
            $table->float('driving_under_alcohol_drug')->nullable();
            $table->float('use_of_phone_driving')->nullable();
            $table->float('night_journey')->nullable();
            $table->float('fatigue')->nullable();
            $table->float('poor_weather')->nullable();
            $table->float('sign_light_violation')->nullable();
            $table->float('others')->nullable();
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
