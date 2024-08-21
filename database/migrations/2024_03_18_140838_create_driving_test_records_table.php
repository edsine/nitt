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
            $table->float('renewal_count')->nullable();
            $table->float('fresh_count')->nullable();
            $table->float('3y_count')->nullable();
            $table->float('5y_count')->nullable();
            $table->float('failure')->nullable();
            $table->float('collected')->nullable();
            $table->float('due_for')->nullable();
            $table->float('lp')->nullable();
            $table->float('total_captured')->nullable();
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
