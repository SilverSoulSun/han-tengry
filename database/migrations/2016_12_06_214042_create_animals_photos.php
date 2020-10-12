<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals_photos', function(Blueprint $table)
        {
            $table->increments('id');

            $table->integer('animal_id')->index();
            $table->string('image');
            $table->string('name')->index();

            $table->string('author');
            $table->string('license');
            $table->string('original_reference');
            $table->string('geo_tags');
            $table->string('behavior');
            $table->string('age');
            $table->string('place');
            $table->string('place_specific');
            $table->timestamp('date');
            
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
