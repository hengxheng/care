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
            $table->string('service_name');
            $table->string('service2_name');
            $table->string('state');
            $table->string('suburb');
            $table->string('postcode');
            $table->date('start_date');
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
            $table->boolean('like')->default(false);
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
