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
            $table->float('containers_count')->nullable();
            $table->float('general_cargo_count')->nullable();
            $table->float('bulk_cargo_count')->nullable();
            $table->float('tankers_count')->nullable();
            $table->float('containers_import_count')->nullable();
            $table->float('containers_export_count')->nullable();
            $table->float('general_cargo_tonnage')->nullable();
            $table->float('bulk_cargo_tonnage')->nullable();
            $table->float('accidents_recorded')->nullable();
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
