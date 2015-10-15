<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuolificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quolification', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->foreign('uid')->references('uid')->on('giver')->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('availability'function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uid');
            $table->foreign('uid')->references('uid')->on('giver')->onDelete('cascade');
            $table->string('week');
            $table->string('time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quolification');
    }
}
