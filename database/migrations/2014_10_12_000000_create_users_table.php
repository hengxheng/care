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
            
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });


        Schema::create('giver',function(Blueprint $table){
            $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('gender');
            $table->string('picture')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('suburb');
            $table->string('state');
            $table->string('postcode');
            $table->integer('rate');
            $table->text('education');
            $table->text('experience');
            $table->timestamps();
        });

        Schema::create('seeker',function(Blueprint $table){
            $table->integer('uid')->unsigned();
            $table->foreign('uid')->references('id')->on('users')->onDelete('cascade');
            $table->string('picture')->nullable();
            $table->boolean('premium')->default(false);
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
        Schema::drop('giver');
        Schema::drop('seeker');
        Schema::drop('users');
    }
}
