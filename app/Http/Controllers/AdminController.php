<?php

use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public static function getDashboard(){

    }
    //not used
    private function validateEnvValue($env_type,$env_name){

        $env_id=DB::table("environments")->where([
            "type"=>$env_type,
            "name"=>$env_name
            ])->first()->value('id');
        if ($env_id){
            return $env_id;
        }else{
            return false;
        }

    }
    //not used
    private function addEnvValue($env_type,$env_name){
        $env_id=DB::table("environments")->insertGetId([
            'type'      =>$env_name,
            'name'      =>$env_name,
            'index'     =>1,
            'url'       =>'',
            'title_en'  =>'',
            'name_en'   =>''
        ]);
        return $env_id;
    }
    private function setEnv($animal_id,$env_id,$env_type){
        // check duplication of en records
        if(!DB::table("animals_".$env_type)->where([
            "animal_id"         =>$animal_id,
            "environment_id"    =>$env_id
        ])->first()){
            return DB::table("animals_".$env_type)->insertGetId([
                "animal_id"         =>$animal_id,
                "environment_id"    =>$env_id
            ]);
        }
        return false;
    }

    public function importGeography(){
        $output_dir = storage_path() . '/import/';
        //dd($output_dir);
        $filePath = self::upload($output_dir);

        $response = [];
        $results = \Excel::load($filePath, function($reader) {})->get()->toArray();
        $response = $results;
        $for_url=[
            'continents'            =>'animals',
            'countries'             =>'animals',
            'regions'               =>'region',
            'introduced_countries'  =>'animals', //do I need this?
            'subcontinents'        =>'subcontinent'

        ];
        $singular=[
            'continents'            =>'continent',
            'countries'             =>'country',
            'regions'               =>'region',
            'introduced_countries'  =>'country',
            'subcontinents'        =>'subcontinent'
        ];

        foreach ($results as $result) {
            $animal_id_by_name = DB::table('animals')->where('name',$result['animal'] )->value('id');
            if($animal_id_by_name){
                $animal_id=$animal_id_by_name;
            }else{
                $animal_id=DB::table('references')->where('url',$result['redlist'] )->value('animal_id');
            }
            if ($animal_id){
                foreach ($result as $env_type=>$env_list) {
                    //looping through the key value pair array
                    //env_names =>env_name
                    if ($env_type != 'animal' && $env_type!='redlist') {
                        $env_list_array = explode(",", $env_list);

                        foreach ($env_list_array as $env_name) {
                            $env_name=trim($env_name);
                            if($env_name!="") {
                                //used instead of broken firstOrCreate

                                /*if(!$env = \Environment::where(
                                        [
                                        "type" => $singular[$env_type],
                                        "name" => $env_name,
                                        ]
                                    )->first()){
                                    //dd($env_name);
                                    $env=\Environment::create(
                                        ["type" => $singular[$env_type],
                                        "name" => $env_name,
                                        'index' => 1,
                                        'url' => strtolower(str_replace(" ", "-", trim($env_name))),
                                        'title_en' => ucwords($env_name),
                                        'name_en' => ucwords($env_name)
                                        ]
                                    );
                                }*/

                                $env = \Environment::firstOrCreate(
                                    ["type" => $singular[$env_type],
                                        "name" => $env_name,
                                    ], [
                                    'index' => 1,
                                    'url' => strtolower(str_replace(" ", "-", trim($env_name))).'-'.$for_url[$env_type],
                                    'title_en' => ucwords($env_name),
                                    'name_en' => ucwords($env_name)
                                ]);
                                $this->setEnv($animal_id, $env->id, $env_type);
                            };
                            //$env ->save();


                            /*
                             $env_id=$this->validateEnvValue("continent",$continent);
                            if(!$env_id) {
                                $env_id=$this->addEnvValue("continent", $continent);
                            }
                            */
                            //$this->setEnv($animal_id, $env->id, $env_type);
                        }
                    }
                }


                //dd($animal_id);

                //add loop through types cont->count-> regions

            }else{
                $_import_errors[]= $result["animal"]." not found";
                //dd($_import_errors);
            }

        };
        if(!empty($_import_errors)){
            $response=$_import_errors;
        }



        return \Response::json($response, 200);
    }

    public static function importPhotos(){

        $animal = ['id' => \Input::get('animal_id')];
        $photos_ids = \Input::get('photos');
        if(empty($photos_ids)) {
            return \Response::json([], 200);   
        }

        foreach ($photos_ids as $i => $photo_id) {
            
            $photo = ['id' => $photo_id];
            dispatch( new \App\Jobs\ImportPhoto($animal, $photo) ); 
            
            $response[] = $photo_id;
            
        }
        
        return \Response::json($response, 200);

    }

    public static function getPhotos(){

        
        $flickrApiUrl = 'https://api.flickr.com/services/rest/?';

        $apiData = [];
        $apiData['method'] = 'flickr.photos.search';
        $apiData['api_key'] = '8e2505e16cd4581eb988b0176a60df4e';
        $apiData['text'] = \Input::get('query');
        $apiData['per_page'] = \Input::get('per_page', 2);
        $apiData['page'] = \Input::get('page', 1);
        $apiData['sort'] = 'relevance';   //'interestingness-desc'; //relevance
        $apiData['license'] = \Input::get('license', 0);
        $apiData['media'] = 'photos';
        $apiData['format'] = 'json';
        $apiData['nojsoncallback'] = '1';

        $query = http_build_query($apiData);


        $data = file_get_contents($flickrApiUrl . $query);
        $photos = json_decode($data, true);


        $response = [];

        $response['total'] = $photos['photos']['total'];

        foreach ($photos['photos']['photo'] as $i => $photo) {

            $response['photos'][$i]['id'] = $photo['id'];
            if(AnimalPhoto::where('flickr_photo_id', $photo['id'])->exists()){
                $response['photos'][$i]['exists'] = true;
            }

            $response['photos'][$i]['original_page'] = 'https://www.flickr.com/photos/'. $photo['owner'] .'/'. $photo['id'] .'/';
            $response['photos'][$i]['title'] = $photo['title'];
            
            $apiData = [];
            $apiData['api_key'] = '8e2505e16cd4581eb988b0176a60df4e';
            $apiData['photo_id'] = $photo['id'];
            $apiData['format'] = 'json';
            $apiData['nojsoncallback'] = '1';
            $apiData['method'] = 'flickr.photos.getSizes';
            $query = http_build_query($apiData);

            $data = file_get_contents($flickrApiUrl . $query);
            $sizes= json_decode($data, true);
            //dd($sizes);

            if (array_key_exists('sizes',$sizes) ) {
                foreach ($sizes['sizes']['size'] as $size) {
                    if ($size['width'] >= 200 and $size['width'] <= 600) {
                        $response['photos'][$i]['sizes']['thumbnail'] = $size;
                    }
                    if ($size['width'] >= 1000 and $size['height'] >= 600) {
                        $response['photos'][$i]['sizes']['original'] = $size;
                    }
                }
            }else{
                unset($response['photos'][$i]);
            }
            if(!isset($response['photos'][$i]['sizes']['original'])){ unset($response['photos'][$i]); }
            
        }

        return \Response::json($response, 200);
    }


    public static function importProperties(){

        $output_dir = storage_path() . '/import/';
        $filePath = self::upload($output_dir);

        $response = [];

        $results = \Excel::load($filePath, function($reader) {})->get()->toArray();
        foreach ($results as $result) {
            $pe = \Property::where('type', $result['type'])->where('name', $result['name'])->exists();
            if(!$pe){
                $property = new \Property;
                $property->type = $result['type'];
                $property->name = $result['name'];
                $property->url = self::makeUrl($result['name']);
                $property->color = self::colour('dark');

                $property->name_en = $result['name'];
                $property->title_en = $result['title'];

                $property->save();

                $response[] =  $property;
            }
        }

        

        return \Response::json($response, 200);
    }

    public static function upload($output_dir){

        $fileName = $_FILES["myfile"]["name"];
        $filePath = $output_dir . $fileName;
        move_uploaded_file($_FILES["myfile"]["tmp_name"], $filePath);

        return $filePath; 
    }


    public static function getAnimals(){

    	$animals = \Animal::with('meta', 'cover')->orderBy('name', 'asc')->get();
    	return \Response::json($animals, 200);
    	
    }

    public static function getProperties(){

        $properties = \Property::orderBy('name', 'asc')->get();
        return \Response::json($properties, 200);
        
    }

    public static function getTaxonomies(){

        $taxonomies = \Taxonomy::orderBy('name', 'asc')->get();
        return \Response::json($taxonomies, 200);
        
    }

    public static function getCategories(){

        $categories = \Category::orderBy('name', 'asc')->get();
        return \Response::json($categories, 200);
        
    }

    public static function cropImage(){


        $original_image = public_path() . Input::get('path') . 'original/' .  Input::get('name');
        //dd(Input::get('ratio'));

        switch ( Input::get('ratio') ) {
            case '1x1':
                $sizes = [
                    'small' => ['w' => '300', 'h' => '300'],
                    'medium' => ['w' => '400', 'h' => '400'],
                    'full' => ['w' => '600', 'h' => '600'],
                ];
                break;

            case '2x1':
                $sizes = [
                    'small' => ['w' => '400', 'h' => '200'],
                    'medium' => ['w' => '800', 'h' => '400'],
                    'full' => ['w' => '1200', 'h' => '600'],
                ];
                break;

            case '1.25x1':
                $sizes = [
                    'small' => ['w' => '375', 'h' => '300'],
                    'medium' => ['w' => '500', 'h' => '400'],
                    'full' => ['w' => '750', 'h' => '600'],
                ];
                break;
            
        }

        $cropped_path = public_path() . Input::get('path');

        foreach ($sizes as $key => $size) {

            $img = Image::make($original_image);
            $img->crop(Input::get('width'), Input::get('height'), Input::get('x'), Input::get('y'));

            $store_dir = $cropped_path . $key . '/' . Input::get('ratio') . '/';
            if (!file_exists($store_dir)) { mkdir($store_dir, 0777, true); }

            $img->resize($size['w'], $size['h']);
            $img->save($store_dir . Input::get('name'), 100);
        }
        
        


        return \Response::json(true, 200);
    }


    
}
