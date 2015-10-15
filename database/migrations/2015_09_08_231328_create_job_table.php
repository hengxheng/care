<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('description');
            $table->integer('poster_id')->unsigned();;
            // $table->foreign('poster_id')->references('uid')->on('seeker')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('submission', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->integer('submited_uid')->unsigned();;
            $table->foreign('submited_uid')->references('uid')->on('giver')->onDelete('cascade');
            $table->text('content');
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
        Schema::drop('submission');
        Schema::drop('job');
    }
}
