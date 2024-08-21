<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterVehicleCategoryInVehicleImportationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicle_importation', function (Blueprint $table) {
            $table->string('vehicle_category')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicle_importation', function (Blueprint $table) {
            $table->integer('vehicle_category')->change();
        });
    }
}
