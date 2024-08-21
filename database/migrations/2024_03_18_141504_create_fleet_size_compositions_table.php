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
            $table->float('4pc')->nullable();
            $table->float('7pc')->nullable();
            $table->float('10pc')->nullable();
            $table->float('14pc')->nullable();
            $table->float('18pc')->nullable();
            $table->float('coaster')->nullable();
            $table->float('big_bus')->nullable();
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
