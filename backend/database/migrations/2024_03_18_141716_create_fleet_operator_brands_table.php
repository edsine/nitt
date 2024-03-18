<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetOperatorBrandsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_operator_brands', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->integer('state');
            $table->integer('toyota_count');
            $table->integer('mercedes_count');
            $table->integer('nissan_count');
            $table->integer('peugeot_count');
            $table->integer('volkswagen_count');
            $table->integer('sharon_count');
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
        Schema::drop('fleet_operator_brands');
    }
}
