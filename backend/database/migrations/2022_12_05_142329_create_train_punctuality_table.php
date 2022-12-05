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
            $table->date('year')->unique();
            $table->bigInteger('number_of_train_delay');
            $table->bigInteger('number_of_late_arrival');
            $table->bigInteger('number_of_prompt_arrival');
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
