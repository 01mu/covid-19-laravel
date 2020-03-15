<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Cases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('country')->nullable();
            $table->float('cfr', null, null)->nullable();
            $table->integer('timestamp')->nullable();
            $table->integer('confirmed')->nullable();
            $table->integer('deaths')->nullable();
            $table->integer('recovered')->nullable();
            $table->integer('new_confirmed')->nullable();
            $table->integer('new_deaths')->nullable();
            $table->integer('new_recovered')->nullable();
            $table->integer('instance')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cases');
    }
}
