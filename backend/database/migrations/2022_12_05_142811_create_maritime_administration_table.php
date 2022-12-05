<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaritimeAdministrationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maritime_administration', function (Blueprint $table) {
            $table->increments('id');
            $table->date('year');
            $table->bigInteger('nigerian_sea_fearers_count');
            $table->bigInteger('foreign_sea_fearers_count');
            $table->bigInteger('number_of_vessels_registered');
            $table->bigInteger('number_of_ships_cabotage');
            $table->bigInteger('number_of_accidents');
            $table->bigInteger('number_of_piracy_attacks');
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
        Schema::drop('maritime_administration');
    }
}
