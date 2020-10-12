<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitatMaps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('animals', function ($table) {
            $table->dropColumn('habitat_map');
        });

        Schema::create('habitat_maps', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('animal_id')->index();
            $table->string('image');
            $table->string('name')->index();
            $table->text('description');
            
            $table->string('author');
            $table->string('author_profile');
            $table->string('license');
            $table->string('original_reference');
            
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
