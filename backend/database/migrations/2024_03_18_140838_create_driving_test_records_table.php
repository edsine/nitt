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
            $table->bigInteger('renewal_count')->nullable();
            $table->bigInteger('fresh_count')->nullable();
            $table->bigInteger('3y_count')->nullable();
            $table->bigInteger('5y_count')->nullable();
            $table->bigInteger('failure')->nullable();
            $table->bigInteger('collected')->nullable();
            $table->bigInteger('due_for')->nullable();
            $table->bigInteger('lp')->nullable();
            $table->bigInteger('total_captured')->nullable();
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
