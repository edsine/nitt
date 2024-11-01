<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaritimeAcademiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maritime_academies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year')->unique();
            $table->float('number_of_staff')->nullable();
            $table->float('number_of_admitted_students')->nullable();
            $table->float('number_of_graduands')->nullable();
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
        Schema::drop('maritime_academies');
    }
}
