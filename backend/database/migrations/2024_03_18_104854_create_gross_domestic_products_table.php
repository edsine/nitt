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
            $table->integer('transportation_and_storage');
            $table->integer('road_transport');
            $table->integer('rail_transport_and_pipelines');
            $table->integer('water_transport');
            $table->integer('air_transport');
            $table->integer('transport_services');
            $table->integer('post_and_courier_services');
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
