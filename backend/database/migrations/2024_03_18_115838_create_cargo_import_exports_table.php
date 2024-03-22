<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoImportExportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo_import_exports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('port');
            $table->integer('year');
            $table->float('import')->nullable();
            $table->float('export')->nullable();
            $table->float('total_throughput')->nullable();
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
        Schema::drop('cargo_import_exports');
    }
}
