<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalMetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_metas', function(Blueprint $table)
        {
            $table->increments('id');
            
            $table->integer('animal_id')->index();
            $table->string('lang')->index();

            $table->string('title')->index();


            $table->text('appearance');
            $table->text('desrtibution');
            $table->text('habits');
            $table->text('nutrition');
            $table->text('mating_habits');
            
            $table->text('population_threats');
            $table->text('population_number');
            $table->text('ecological_niche');
            $table->text('domestication');
            
            $table->string('wikipedia_reference');

            $table->string('baby_name');
            $table->string('pregnancy_duration');
            $table->string('reproduction_season');
            $table->string('baby_carrying');
            $table->string('independent_age');

            $table->string('common_names');
            $table->string('height');
            $table->string('lengths');
            $table->string('weight');
            $table->string('life_span');
            $table->string('speed');
   
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
        //
    }
}
