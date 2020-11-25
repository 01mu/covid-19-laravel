<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CasesUs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases_us', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('state')->nullable();
            $table->float('cfr', null, null)->nullable();
            $table->integer('timestamp')->nullable();
            $table->integer('confirmed')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('recovered')->nullable();
            $table->integer('new_confirmed')->nullable();
            $table->integer('new_deaths')->nullable();
            $table->integer('new_recovered')->nullable();
            $table->integer('instance')->nullable();
            $table->float('confirmed_per', null, null)->nullable();
            $table->float('deaths_per', null, null)->nullable();
            $table->float('recovered_per', null, null)->nullable();
            $table->float('new_confirmed_per', null, null)->nullable();
            $table->float('new_deaths_per', null, null)->nullable();
            $table->float('new_recovered_per', null, null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cases_us');
    }
}
