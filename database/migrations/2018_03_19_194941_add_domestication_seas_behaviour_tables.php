<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDomesticationSeasBehaviourTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('animals_domestication', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('animal_id')->index();
            $table->integer('property_id')->index();
        });

        Schema::create('animals_seasonal_behaviors', function(Blueprint $table)
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
