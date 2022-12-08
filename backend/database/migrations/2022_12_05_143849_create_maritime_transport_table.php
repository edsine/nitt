<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaritimeTransportTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maritime_transport', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->bigInteger('containers_count');
            $table->bigInteger('general_cargo_count');
            $table->bigInteger('bulk_cargo_count');
            $table->bigInteger('tankers_count');
            $table->bigInteger('containers_import_count');
            $table->bigInteger('containers_export_count');
            $table->bigInteger('general_cargo_tonnage');
            $table->bigInteger('bulk_cargo_tonnage');
            $table->bigInteger('accidents_recorded');
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
        Schema::drop('maritime_transport');
    }
}
