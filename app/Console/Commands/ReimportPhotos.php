<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ReimportPhotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photos:reimport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ReimportPhotos';

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
        $photos = \AnimalPhoto::whereNotNull('flickr_photo_id')->get();

        foreach ($photos as $photo) {
            if(empty($photo['flickr_photo_id'])) { continue; }
            $this->reimport($photo);

            $this->info('Reimported: ' . $photo['id']);
        }

        $this->info('Reimport complete!');
        
    }

    public function reimport($photo){

        $flickrApiUrl = 'https://api.flickr.com/services/rest/?';

        $data = [];
        //$response = [];

        $apiData = [];
        $apiData['api_key'] = '8e2505e16cd4581eb988b0176a60df4e';
        
        $apiData['photo_id'] = $photo['flickr_photo_id'];
        $apiData['format'] = 'json';
        $apiData['nojsoncallback'] = '1';
        
        $apiData['method'] = 'flickr.photos.getSizes';
        $query = http_build_query($apiData);
        $getData = file_get_contents($flickrApiUrl . $query);
        $sizes = json_decode($getData, true);
        foreach ($sizes['sizes']['size'] as $size) {
            if($size['width'] >= 1000 and $size['height'] >= 600){ $data['image'] = $size; }
        }

        $path = public_path() . '/uploads/animals/photos/';
        $original_path =  $path . 'original/';
        $image_name = $photo->image;
        
        if(!copy($data['image']['source'], $original_path . $image_name)){
            //throw new \Exception("Cant copy image " . $data['image']['source']);   
        }

        $types = array(
            'full/1x1/' => array(600, 600, 'crop'),
            'medium/1x1/' => array(400, 400, 'crop'),
            'small/1x1/' => array(300, 300, 'crop'),

            'full/2x1/' => array(1600, 800, 'crop'),
            'medium/2x1/' => array(800, 400, 'crop'),
            'small/2x1/' => array(400, 200, 'crop'),

            'full/1.25x1/' => array(750, 600, 'crop'),
            'medium/1.25x1/' => array(500, 400, 'crop'),
            'small/1.25x1/' => array(375, 300, 'crop'),

            'full/original/' => array(1600, 1200, 'auto'),
            'medium/original/' => array(800, 600, 'auto'),
            'small/original/' => array(400, 300, 'auto'),
        );

        foreach ($types as $type => $size) {
            if (!file_exists($path . $type)) { mkdir($path . $type, 0777, true); }

            $workimage = \Image::make($original_path . $image_name);
            $iw = $workimage->width();
            $ih = $workimage->height();

            switch ($size[2]) {
                case 'crop':
                    $workimage->fit($size[0],  $size[1], function ($constraint) {
                        $constraint->upsize();
                    });
                    break;
                
                case 'auto':
                    $workimage->widen($size[0], function ($constraint) {
                        $constraint->upsize();
                    });
                    $workimage->heighten($size[1], function ($constraint) {
                        $constraint->upsize();
                    });
                    break;
            }

            $destination_file = $path . $type . $image_name;

            $workimage->save($destination_file, 80);
            $workimage->destroy();

        }
    }
}
