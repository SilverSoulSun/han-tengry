<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSourceToProp extends Migration
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
            $table->string('source_en')->nullable();
            $table->string('source_ru')->nullable();
        });

        Schema::table('properties', function($table)
        {
            $table->string('source_en')->nullable();
            $table->string('source_ru')->nullable();
        });

        Schema::table('taxonomies', function($table)
        {
            $table->string('source_en')->nullable();
            $table->string('source_ru')->nullable();
        });

        Schema::table('environments', function($table)
        {
            $table->string('source_en')->nullable();
            $table->string('source_ru')->nullable();
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
