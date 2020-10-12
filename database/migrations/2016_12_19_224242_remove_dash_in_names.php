<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveDashInNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('properties', function ($table) {
            $table->dropColumn('title-en');
            $table->dropColumn('description-en');
            $table->dropColumn('title-ru');
            $table->dropColumn('description-ru');

            $table->string('title_en')->index();
            $table->text('description_en');
            $table->string('title_ru')->index();
            $table->text('description_ru');
        });

        Schema::table('taxonomies', function ($table) {
            $table->dropColumn('title-en');
            $table->dropColumn('description-en');
            $table->dropColumn('title-ru');
            $table->dropColumn('description-ru');

            $table->string('title_en')->index();
            $table->text('description_en');
            $table->string('title_ru')->index();
            $table->text('description_ru');
        });

        Schema::table('categories', function ($table) {
            $table->dropColumn('title-en');
            $table->dropColumn('description-en');
            $table->dropColumn('title-ru');
            $table->dropColumn('description-ru');

            $table->string('title_en')->index();
            $table->text('description_en');
            $table->string('title_ru')->index();
            $table->text('description_ru');
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
