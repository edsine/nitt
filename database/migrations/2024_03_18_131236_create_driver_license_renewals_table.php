<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverLicenseRenewalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_license_renewals', function (Blueprint $table) {
            $table->increments('id');
            $table->text('state');
            $table->integer('year');
            $table->integer('vehicle_class');
            $table->integer('male_count')->nullable();
            $table->integer('female_count')->nullable();
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
        Schema::drop('driver_license_renewals');
    }
}
