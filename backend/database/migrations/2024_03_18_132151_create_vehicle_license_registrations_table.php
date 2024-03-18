<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleLicenseRegistrationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_license_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->text('state');
            $table->bigInteger('car');
            $table->bigInteger('van');
            $table->bigInteger('lorry');
            $table->bigInteger('mini_bus');
            $table->bigInteger('big_bus');
            $table->bigInteger('tanker');
            $table->bigInteger('trailer');
            $table->bigInteger('tipper');
            $table->bigInteger('tractor');
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
        Schema::drop('vehicle_license_registrations');
    }
}
