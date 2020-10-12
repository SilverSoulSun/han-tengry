<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Intervention\Image\Image;

class ImportPhoto implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $photo;
    protected $animal;

    public function __construct($animal, $photo)
    {
        $this->animal = $animal;
        $this->photo = $photo;
    }

    /**
     * @throws \Exception
     */
    public function handle()
    {

        $flickrApiUrl = 'https://api.flickr.com/services/rest/?';

        $data = [];
        //$response = [];

        $apiData = [];
        $apiData['api_key'] = '8e2505e16cd4581eb988b0176a60df4e';
        
        $apiData['photo_id'] = $this->photo['id'];
        $apiData['format'] = 'json';
        $apiData['nojsoncallback'] = '1';

        $apiData['method'] = 'flickr.photos.getInfo';
        $query = http_build_query($apiData);
        $getData = file_get_contents($flickrApiUrl . $query);
        $info = json_decode($getData, true);
        $data['info'] = $info['photo'];
        
        $apiData['method'] = 'flickr.photos.getSizes';
        $query = http_build_query($apiData);
        $getData = file_get_contents($flickrApiUrl . $query);
        $sizes = json_decode($getData, true);
        foreach ($sizes['sizes']['size'] as $size) {
            if($size['width'] >= 1000 and $size['height'] >= 600){ $data['image'] = $size; }
        }

        //var_dump($data);

        $photo = new \AnimalPhoto();
        $photo->animal_id = $this->animal['id'];
        $photo->flickr_photo_id = $data['info']['id'];
        $photo->name = $data['info']['title']['_content']; 
        $photo->description = $data['info']['description']['_content'];
        $photo->original_reference = $data['info']['urls']['url'][0]['_content'];
        $photo->date = $data['info']['dates']['taken'];
        //Carbon::parse('2012-9-5 23:26:11.123789')->timestamp();

        if (!empty($data['info']['owner']['realname'])) {
            $photo->author = $data['info']['owner']['realname'];
        } else {
            $photo->author = $data['info']['owner']['username'];
        }

        $photo->author_profile = dirname($photo->original_reference);

        switch ($data['info']['license']) {
            case "0":
              $photo->license = 'All Rights Reserved';
              break;
            case "1":
              $photo->license = 'Attribution-NonCommercial-ShareAlike License';
              break;
            case "2":
              $photo->license = 'Attribution-NonCommercial License';
              break;
            case "3":
              $photo->license = 'Attribution-NonCommercial-NoDerivs License';
              break;
            case "4":
              $photo->license = 'Attribution License';
              break;
            case "5":
              $photo->license = 'Attribution-ShareAlike License';
              break;
            case "6":
              $photo->license = 'Attribution-NoDerivs License';
              break;
            case "7":
              $photo->license = 'No known copyright restrictions';
              break;
            case "8":
              $photo->license = 'United States Government Work';
              break;
            case "9":
                $photo->license = 'Public Domain Dedication (CC0)';
            break;
            case "10":
                $photo->license = 'Public Domain Mark';
            break;

        }

        $path = public_path() . '/uploads/animals/photos/';
        $original_path =  $path . 'original/';
        $check_path =   $path . 'full/original/';
        $image_name = \Controller::makeUrl($photo->name) . '.jpg';
        $image_name = \AnimalPhoto::fileNewname($image_name);

        $photo->image = $image_name;

        
        if(!copy($data['image']['source'], $original_path . $image_name)){
            throw new \Exception("Cant copy image " . $data['image']['source']);
        }
        \Tinify\setKey("6YT3TaqpCqUbAPRkBm6_2hj90mzfpgpT");
        $source = \Tinify\fromFile($original_path .$photo->image);
        $source ->preserve("copyright", "creation","location");
        $source->toFile($original_path .$photo->image);
        $photo->tinypng=1;

        $photo->save();


        $types = array(
            'full/1x1/' => array(600, 600, 'crop'),
            'medium/1x1/' => array(400, 400, 'crop'),
            'small/1x1/' => array(300, 300, 'crop'),

            'full/2x1/' => array(1600, 800, 'crop'),
            //'medium/2x1/' => array(800, 400, 'crop'),
            //'small/2x1/' => array(400, 200, 'crop'),

            'full/1.25x1/' => array(750, 600, 'crop'),
            //'medium/1.25x1/' => array(500, 400, 'crop'),
            //'small/1.25x1/' => array(375, 300, 'crop'),

            'full/original/' => array(1600, 1200, 'auto'),
            'medium/original/' => array(800, 600, 'auto'),
            //'small/original/' => array(400, 300, 'auto'),
        );

        foreach ($types as $type => $size) {
            if (!file_exists($path . $type)) { mkdir($path . $type, 0777, true); }
            /** @var Image $workimage */
            $workimage = \Image::make($original_path . $image_name);

            //$iw = $workimage->width();
            //$ih = $workimage->height();


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

        

        //return;
        //$response[] = $photo;
    }
}
