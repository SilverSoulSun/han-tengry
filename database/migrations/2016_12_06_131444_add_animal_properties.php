<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnimalProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_biomes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_looks', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_lifestyles', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_social_behaviors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_mating_behaviors', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_climate_zones', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_diets', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_others', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });


        Schema::create('animals_preys', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_active_day_periods', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_predators', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
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
