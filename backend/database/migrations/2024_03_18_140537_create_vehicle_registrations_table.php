<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleRegistrationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('vehicle_type');
            $table->bigInteger('private_count')->nullable();
            $table->bigInteger('commercial_count')->nullable();
            $table->bigInteger('government_count')->nullable();
            $table->bigInteger('diplomatic_count')->nullable();
            $table->bigInteger('schools_count')->nullable();
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
        Schema::drop('vehicle_registrations');
    }
}
