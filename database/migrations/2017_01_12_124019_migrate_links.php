<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrateLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $animals = Animal::all();
        foreach ($animals as $animal) {
            if(empty($animal->redlist_reference)) continue;
            $reference = new Reference;
            $reference->animal_id = $animal->id;
            $reference->type = 'redlist';
            $reference->lang = 'en';
            $reference->name = 'IUCN Red List';
            $reference->url = $animal->redlist_reference;
            $reference->save();
        }

        $metas = AnimalMeta::all();
        foreach ($metas as $meta) {
            if(empty($meta->wikipedia_reference)) continue;
            $reference = new Reference;
            $reference->animal_id = $meta->id;
            $reference->type = 'wikipedia';
            $reference->lang = $meta->lang;
            $reference->name = 'Wikipedia article';
            $reference->url = $meta->wikipedia_reference;
            $reference->save();
        }


        Schema::table('animals', function ($table) {
            $table->dropColumn('redlist_reference');
        });

        Schema::table('animals_metas', function ($table) {
            $table->dropColumn('wikipedia_reference');
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
