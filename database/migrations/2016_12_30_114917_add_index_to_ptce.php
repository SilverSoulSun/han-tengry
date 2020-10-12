<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToPtce extends Migration
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
            $table->boolean('index')->index();
        });

        Schema::table('properties', function($table)
        {
            $table->boolean('index')->index();
        });

        Schema::table('taxonomies', function($table)
        {
            $table->boolean('index')->index();
        });

        Schema::table('environments', function($table)
        {
            $table->boolean('index')->index();
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
