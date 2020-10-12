<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameTranslation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function($table)
        {
            $table->string('name_en')->index();
            $table->string('name_ru')->index();
            $table->boolean('active')->index();

        });

        Schema::table('taxonomies', function($table)
        {
            $table->string('name_en')->index();
            $table->string('name_ru')->index();

        });

        Schema::table('properties', function($table)
        {
            $table->string('name_en')->index();
            $table->string('name_ru')->index();

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
