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
            $table->date('year')->unique();
            $table->bigInteger('number_of_staff');
            $table->bigInteger('number_of_admitted_students');
            $table->bigInteger('number_of_graduands');
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
