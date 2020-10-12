<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Image;


class tinyfy_images extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tinyfy_images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        \Tinify\setKey("6YT3TaqpCqUbAPRkBm6_2hj90mzfpgpT");
        $this->info("Key is set");
        $path = public_path() . '/uploads/animals/photos/';
        $original_path =  $path . 'original/';

        $photos = \AnimalPhoto::get();
        $j=0;

        foreach ($photos as $i=> $photo){


            $this->info($photo->id . " ".$photo->image . " object creation is attempted");


            $workimage = \Image::make($original_path .$photo->image);


                if ((int)$workimage->filesize() > 5000000 && !$photo->tinypng) {
                    if ($j > 200) {
                        break;
                    }
                    $this->info($workimage->filesize());
                    $this->info($j.". ".$photo->id . " " . $photo->name . " tinifyning started" . $original_path . $photo->image);
                    $source = \Tinify\fromFile($original_path . $photo->image);
                    $source->preserve("copyright", "creation", "location");
                    $source->toFile($original_path . $photo->image);
                    $j += 1;
                    $photo->tinypng = 1;
                    $photo->save();
                    $this->info($photo->image . " tinification is completed");
                }
                if($i%100==0){
                    $this->info($i . " images checked");
                }

                $this->info($photo->id . " ".$photo->image . " object is succesfully created");




                    /*foreach ($types as $type => $size) {
                        $destination_file = $path . $type . $photo->image;
                        if (!file_exists($destination_file)){

                            $workimage = \Image::make($original_path .$photo->image);
                            $workimage->fit($size[0],  $size[1], function ($constraint) {
                                $constraint->upsize();
                            });
                            $workimage->save($destination_file, 80);
                            $workimage->destroy();
                        }
                    }*/

            }


        $this->info("mass tinification is complete ".$i. " photos tinyfied");

    }
}
