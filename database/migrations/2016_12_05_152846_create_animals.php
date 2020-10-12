<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function(Blueprint $table)
        {
            $table->increments('id');
            
            $table->string('name')->index();
            $table->string('scientific_name')->index();
            $table->string('url')->unique();
            $table->string('cover')->nullable();

            $table->integer('category_id')->index()->nullable();
            $table->integer('taxonomy_id')->index()->nullable();

            $table->integer('population_status_id')->index()->nullable();
            $table->integer('current_population_trend_id')->index()->nullable();

            $table->integer('views')->index();
            
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
