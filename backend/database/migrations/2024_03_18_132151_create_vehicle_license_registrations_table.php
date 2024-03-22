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
            $table->float('car')->nullable();
            $table->float('van')->nullable();
            $table->float('lorry')->nullable();
            $table->float('mini_bus')->nullable();
            $table->float('big_bus')->nullable();
            $table->float('tanker')->nullable();
            $table->float('trailer')->nullable();
            $table->float('tipper')->nullable();
            $table->float('tractor')->nullable();
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
