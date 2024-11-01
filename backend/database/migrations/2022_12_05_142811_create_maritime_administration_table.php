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
            $table->integer('year')->unique();
            $table->float('nigerian_sea_fearers_count')->nullable();
            $table->float('foreign_sea_fearers_count')->nullable();
            $table->float('number_of_vessels_registered')->nullable();
            $table->float('number_of_ships_cabotage')->nullable();
            $table->float('number_of_accidents')->nullable();
            $table->float('number_of_piracy_attacks')->nullable();
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
