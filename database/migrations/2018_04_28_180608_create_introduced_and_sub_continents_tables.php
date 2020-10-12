<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntroducedAndSubContinentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('animals_introduced_countries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('environment_id')->index();
        });

        Schema::create('animals_subcontinents', function(Blueprint $table)
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
