<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetSizeCompositionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_size_compositions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('state');
            $table->integer('year');
            $table->bigInteger('4pc')->nullable();
            $table->bigInteger('7pc')->nullable();
            $table->bigInteger('10pc')->nullable();
            $table->bigInteger('14pc')->nullable();
            $table->bigInteger('18pc')->nullable();
            $table->bigInteger('coaster')->nullable();
            $table->bigInteger('big_bus')->nullable();
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
        Schema::drop('fleet_size_compositions');
    }
}
