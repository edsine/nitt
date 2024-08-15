<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrossDomesticProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gross_domestic_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->float('transportation_and_storage')->nullable();
            $table->float('road_transport')->nullable();
            $table->float('rail_transport_and_pipelines')->nullable();
            $table->float('water_transport')->nullable();
            $table->float('air_transport')->nullable();
            $table->float('transport_services')->nullable();
            $table->float('post_and_courier_services')->nullable();
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
        Schema::drop('gross_domestic_products');
    }
}
