<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');
            $table->string('countrycode');
            $table->string('region1');
            $table->string('region2');
            $table->string('region3');
            $table->string('postcode');
            $table->string('locality');
            $table->decimal('latitude',13,9);
            $table->decimal('longitude',13,9);
            $table->string('iso');
            $table->string('fips');
            $table->string('hasc');
            $table->string('stat');
            $table->string('timezone');
            $table->string('utc');
            $table->string('dst');
            $table->index('postcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('location');
    }
}
