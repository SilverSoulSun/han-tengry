<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFpidToPhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('animals_photos', function($table)
        {
            $table->string('flickr_photo_id')->nullable()->index();
            $table->string('latitude')->nullable()->index();
            $table->string('longitude')->nullable()->index();

            $table->dropColumn('geo_tags');

            $table->text('description');
            $table->string('author_profile');
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
