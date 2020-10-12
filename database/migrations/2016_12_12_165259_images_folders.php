<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImagesFolders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $folders = [
            '/uploads/animals/photos/original/',
            '/uploads/animals/photos/full/',
            '/uploads/animals/photos/medium/',
            '/uploads/animals/photos/small/',

            // '/uploads/animals/covers/original/',
            // '/uploads/animals/covers/full/',
            // '/uploads/animals/covers/medium/',
            // '/uploads/animals/covers/small/',

            '/uploads/animals/maps/original/',

            '/uploads/catalog/covers/original/',
            '/uploads/catalog/covers/full/',
            '/uploads/catalog/covers/medium/',
            '/uploads/catalog/covers/small/',
        ];

        foreach ($folders as $folder) {
            $folder = public_path() . $folder;

            if (!file_exists($folder)) { 
                mkdir($folder, 0777, true); 
            }
        }
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
