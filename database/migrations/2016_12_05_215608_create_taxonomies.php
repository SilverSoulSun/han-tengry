<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function(Blueprint $table)
        {
            $table->increments('id');
            
            $table->integer('parent_id')->index()->nullable();

            $table->string('name')->index();
            $table->string('url')->unique();

            $table->string('cover')->nullable();
            $table->string('color')->nullable();

            $table->string('title-en')->index();
            $table->text('description-en');

            $table->string('title-ru')->index();
            $table->text('description-ru');

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
