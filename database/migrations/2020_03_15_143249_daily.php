<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Daily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->bigIncrements('id');
        $table->string('type')->nullable();
        $table->integer('timestamp')->nullable();
        $table->integer('value')->nullable();
        $table->integer('instance')->nullable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('daily')
    }
}
