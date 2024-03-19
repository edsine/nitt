<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverLicenseIssuancesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_license_issuances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('state');
            $table->integer('year');
            $table->bigInteger('male_count')->nullable();
            $table->bigInteger('female_count')->nullable();
            $table->integer('vehicle_class');
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
        Schema::drop('driver_license_issuances');
    }
}
