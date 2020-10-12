<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnvironmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environments', function(Blueprint $table)
        {
            $table->increments('id');
            
            $table->integer('parent_id')->index()->nullable();
            $table->string('type')->index();

            $table->string('name')->index();
            $table->string('url')->unique();

            $table->string('cover')->nullable();
            $table->string('color')->nullable();

            $table->string('name_en')->index();
            $table->string('title_en')->index();
            $table->text('description_en');

            $table->string('name_ru')->index();
            $table->string('title_ru')->index();
            $table->text('description_ru');

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
