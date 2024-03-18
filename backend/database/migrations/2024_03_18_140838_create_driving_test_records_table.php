<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingTestRecordsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driving_test_records', function (Blueprint $table) {
            $table->increments('id');
            $table->text('state');
            $table->integer('year');
            $table->bigInteger('renewal_count');
            $table->bigInteger('fresh_count');
            $table->bigInteger('3y_count');
            $table->bigInteger('5y_count');
            $table->bigInteger('failure');
            $table->bigInteger('collected');
            $table->bigInteger('due_for');
            $table->bigInteger('lp');
            $table->bigInteger('total_captured');
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
        Schema::drop('driving_test_records');
    }
}
