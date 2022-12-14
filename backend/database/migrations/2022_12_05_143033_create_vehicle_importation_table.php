<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleImportationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_importation', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('vehicle_category');
            $table->bigInteger('new_vehicle_count');
            $table->bigInteger('used_vehicle_count');
            $table->unique(['year', 'vehicle_category']);
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
        Schema::drop('vehicle_importation');
    }
}
