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
            $table->string('state');
            $table->integer('toyota_count')->nullable();
            $table->integer('mercedes_count')->nullable();
            $table->integer('nissan_count')->nullable();
            $table->integer('peugeot_count')->nullable();
            $table->integer('volkswagen_count')->nullable();
            $table->integer('sharon_count')->nullable();
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
