<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainPunctualityTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_punctuality', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->float('number_of_train_delay')->nullable();
            $table->float('number_of_late_arrival')->nullable();
            $table->float('number_of_prompt_arrival')->nullable();
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
        Schema::drop('train_punctuality');
    }
}
