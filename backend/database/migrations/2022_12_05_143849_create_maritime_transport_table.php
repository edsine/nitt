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
            $table->bigInteger('containers_count')->nullable();
            $table->bigInteger('general_cargo_count')->nullable();
            $table->bigInteger('bulk_cargo_count')->nullable();
            $table->bigInteger('tankers_count')->nullable();
            $table->bigInteger('containers_import_count')->nullable();
            $table->bigInteger('containers_export_count')->nullable();
            $table->bigInteger('general_cargo_tonnage')->nullable();
            $table->bigInteger('bulk_cargo_tonnage')->nullable();
            $table->bigInteger('accidents_recorded')->nullable();
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
