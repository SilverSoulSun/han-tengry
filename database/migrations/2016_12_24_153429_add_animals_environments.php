<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnimalsEnvironments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_continents', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_countries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_lakes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_rivers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_islands', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_mountains', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_regions', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_deserts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_oceans', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_seas', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        }); 
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
