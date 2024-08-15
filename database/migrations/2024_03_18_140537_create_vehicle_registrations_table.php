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
            $table->float('private_count')->nullable();
            $table->float('commercial_count')->nullable();
            $table->float('government_count')->nullable();
            $table->float('diplomatic_count')->nullable();
            $table->float('schools_count')->nullable();
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
