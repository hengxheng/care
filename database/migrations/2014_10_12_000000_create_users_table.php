<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('user_type');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('picture')->default('default.png');
            $table->string('status')->default("Inactive");
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamp('last_login')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });


        Schema::create('giver',function(Blueprint $table){
            $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('gender');
            $table->string('picture')->default('default.png');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('suburb');
            $table->string('state');
            $table->string('postcode');
            $table->boolean('live_in')->default(false);
            $table->string('years_exp')->nullable();
            $table->integer('rate')->nullable();
            $table->text('bio')->nullable();
            $table->text('education')->nullable();
            $table->text('experience')->nullable();
            $table->string('background_check');
            $table->timestamps();
        });

        Schema::create('seeker',function(Blueprint $table){
            $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('suburb');
            $table->string('state');
            $table->string('postcode');
            $table->string('picture')->default('default.png');
            $table->boolean('premium')->default(false);
            $table->timestamps();
        });

        Schema::create('quolification', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('giver_id');
            // $table->foreign('giver_id')->references('uid')->on('giver')->onDelete('cascade');
            $table->string('quolification_name');
            $table->timestamps();
        });

        Schema::create('service', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giver_id');
            // $table->foreign('giver_id')->references('uid')->on('giver')->onDelete('cascade');
            $table->string('service_name');
            $table->timestamps();
        });

        Schema::create('service2', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giver_id');
            $table->string('service_name');
            $table->timestamps();
        });

        Schema::create('availability', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giver_id');
            // $table->foreign('giver_id')->references('uid')->on('giver')->onDelete('cascade');
            $table->string('week');
            $table->string('time');
            $table->boolean('av');
            $table->timestamps();
        });

        Schema::create('rating', function (Blueprint $table){
            $table->increments('rid');
            $table->integer('rate_uid');
            $table->integer('rateby_uid');
            $table->integer('rate_star');
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
        Schema::drop('rating');
        Schema::drop('quolification');
        Schema::drop('availability');
        Schema::drop('service');
        Schema::drop('service2');
        Schema::drop('giver');
        Schema::drop('seeker');
        Schema::drop('users');

    }
}
