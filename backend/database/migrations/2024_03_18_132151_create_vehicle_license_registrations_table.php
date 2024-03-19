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
            $table->bigInteger('car')->nullable();
            $table->bigInteger('van')->nullable();
            $table->bigInteger('lorry')->nullable();
            $table->bigInteger('mini_bus')->nullable();
            $table->bigInteger('big_bus')->nullable();
            $table->bigInteger('tanker')->nullable();
            $table->bigInteger('trailer')->nullable();
            $table->bigInteger('tipper')->nullable();
            $table->bigInteger('tractor')->nullable();
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
