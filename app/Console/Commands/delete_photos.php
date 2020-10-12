<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Image;

class delete_photos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete_photos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete photos for dev server';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $path = public_path() . '/uploads/animals/photos/';
        $original_path =  $path . 'original/';
        $types = array(
            'full/1.25x1/' => array(750, 600),
            'medium/1.25x1/' => array(500, 400),
            'small/1.25x1/' => array(375, 300)
        );
        $photos = \AnimalPhoto::where('animal_id','>',0);
        $total=0;

        foreach ($photos as $i=> $photo){
            foreach ($types as $type => $size) {
                $destination_file = $path . $type . $photo->image;
                $original_file= $original_path.$photo->image;
                if (file_exists($destination_file)){
                    /** @var Image $workimage */
                    $workimage = \Image::make($original_file);
                    $workimage1= \Image::make($destination_file);
                    /*$workimage->fit($size[0],  $size[1], function ($constraint) {
                        $constraint->upsize();
                    });
                    $workimage->save($destination_file, 80);*/
                    $workimage->destroy();
                    $workimage1->destroy();
                }
            }
            $this->info($photo->image." deleted");
            $total = $i;

        }
        $photos->delete();
        $this->info("mass delete is completed ". $total." photos is deleted");
    }
}
