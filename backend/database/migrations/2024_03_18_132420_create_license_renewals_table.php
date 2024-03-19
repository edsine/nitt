<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseRenewalsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_renewals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->bigInteger('car')->nullable();
            $table->bigInteger('van')->nullable();
            $table->bigInteger('lorry')->nullable();
            $table->bigInteger('mini_bus')->nullable();
            $table->bigInteger('big_bus')->nullable();
            $table->bigInteger('tanker')->nullable();
            $table->bigInteger('trailer')->nullable();
            $table->bigInteger('tipper')->nullable();
            $table->bigInteger('tractor')->nullable();
            $table->text('state');
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
        Schema::drop('license_renewals');
    }
}
