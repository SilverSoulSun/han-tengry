<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('references', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('animal_id')->index();
            $table->string('lang')->index();
            $table->string('type')->index();
            $table->string('name');
            $table->string('url');
            
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
