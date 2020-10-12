<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Image;

class masscrop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'masscrop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mass crop of photos 1.25x1';

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
        $photos = \AnimalPhoto::get();

        foreach ($photos as $i=> $photo){
            $this->info($photo->id." ".$photo->name." crop started");
            foreach ($types as $type => $size) {
                $destination_file = $path . $type . $photo->image;
                if (!file_exists($destination_file)){
                    /** @var Image $workimage */
                    $workimage = \Image::make($original_path .$photo->image);
                    $workimage->fit($size[0],  $size[1], function ($constraint) {
                        $constraint->upsize();
                    });
                    $workimage->save($destination_file, 80);
                    $workimage->destroy();
                }
            }
            $this->info($photo->image." crop complete");

        }
        $this->info("mass crop complete ".$i. " photos cropped");
    }
}
