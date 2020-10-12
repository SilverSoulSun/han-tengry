<?php

namespace Api;

use Animal;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class AnimalController extends \Controller {

    public function search($keyword)
    {
        try{

            $statusCode = 200;
            $response = [];

            $dataset = \DB::table('animals')->select ('name','url')->where('name','like','%'.$keyword.'%')->get();


        }catch (Exception $e){
            $statusCode = 400;
        }

        $response= $dataset;
        if(\Request::ajax() || \Request::wantsJson()){
            return \Response::json($response, $statusCode);
        }else{
            return $response;
        }

    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($conditions = null)
	{
		try{

	        $statusCode = 200;
	        $response = [];
	        
	        $page = \Input::get('page', 1);
	        if($page != 1 and (\Request::ajax() or \Request::wantsJson()) ){
	        	$perPage = \Input::get('perPage', 40);
	        }else{
	        	$perPage = \Input::get('perPage', 41);
	        }
	        

	        $query = \Animal::select('animals.*');

	        if(\Input::has('category_id') or isset($conditions['category_id']) ){
	        	$category_id = \Input::get('category_id', $conditions['category_id']);
	            $query->where('category_id', $category_id);
	        }

	        if(\Input::has('taxonomy_id') or isset($conditions['taxonomy_id']) ){
	        	$taxonomy_id = \Input::get('taxonomy_id', $conditions['taxonomy_id']);
	            $query->taxonomy($taxonomy_id);
	        }

	        if(\Input::has('property_id') or isset($conditions['property_id']) ){
	        	$property_id = \Input::get('property_id', $conditions['property_id']);
	            $query->property($property_id);
                //dd($query);
	        }

	        if(\Input::has('environment_id') or isset($conditions['environment_id']) ){
	        	$environment_id = \Input::get('environment_id', $conditions['environment_id']);
	            $query->environment($environment_id);
	            //dd($query);
	        }


	        $total = $query->count();
	        $animals = $query->with('meta', 'cover')->orderBy('views', 'desc')->skip(($page - 1) * $perPage)->take($perPage)->get()->toArray();

	        $response = new Paginator($animals, $total, $perPage, $page, [
	            'path'  => \Request::url(),
	            'query' => \Request::query(),
	        ]);
	 
	    }catch (Exception $e){
	        $statusCode = 400;
	    }

	    if(\Request::ajax() || \Request::wantsJson()){
        	return \Response::json($response, $statusCode);
	    }else{
	        return $response;
	    }

	}




	public function show($id)
	{
		try {

            $statusCode = 200;

            $with = [
                'references',
                'cover',
                'habitat_map',
                'meta',
                'category',
                'taxonomy',
                'population_status',
                'current_population_trend',
                'diets',
                'biomes',
                'looks',
                'lifestyles',
                'social_behaviors',
                'seasonal_behaviors',
                'domestication',
                'mating_behaviors',
                'climate_zones',
                'preys',
                'active_day_periods',
                'predators',
                'others',
                'continents',
                'subcontinents',
                'countries',
                'introduced_countries',
                'deserts',
                'islands',
                'lakes',
                'mountains',
                'oceans',
                'seas',
                'regions',
                'rivers',
                'videos'
            ];

            $animal = \Animal::with($with)->where('id', $id)->first();

            //dd($animal);

            if (!\BrowserDetect::isBot()) {
                $animal->timestamps = false;
                $animal->views++;
                $animal->save();
            }


            $animal = $animal->toArray();
            $animal['taxonomies'] = \Taxonomy::breadcrumbs($animal['taxonomy_id']);
            /* I can not figure out this code
            $ps_reference = \Reference::where('animal_id', $animal['id'])->where('type', 'redlist')->first();
            if ($ps_reference) {
                $ps_reference_url = $ps_reference['url'];
            } else {
                $ps_reference_url = false;
            }
            */
            //I don't understand why model is required to define the population status
            // requires refactoring
            $animal['statuses'] = \Property::populationStatuses($animal['population_status'],false);

            $animal['photos'] = [];
            $photosUsedIds = [];

            /*foreach ($animal['photos']['title'] as $photo) {
                $photosUsedIds[] = $photo['id'];
            }*/
            $animal['photos']['total'] = \AnimalPhoto::where('animal_id', $animal['id'])->count();
            //explanation to the strange manipulations with photos by section
            //in previous design there were several photos per section required instead 1 photo per section now
            // needs to be refactored
            $animal['photos']['lifestyle'] = \AnimalPhoto::where('section', 'lifestyle')->where('animal_id', $animal['id'])->take(1)->get();
            if (count($animal['photos']['lifestyle']) < 1 ) {
                $animal['photos']['lifestyle'] = \AnimalPhoto::inRandomOrder()->whereNotIn('id', $photosUsedIds)->where('animal_id', $animal['id'])->where('cover', false)->take(1)->get();
                if (count($animal['photos']['lifestyle'])>0) {
                    $photosUsedIds[] = $animal['photos']['lifestyle'][0]['id'];
                }
            }

            if (!empty($animal['meta']['domestication'])) {
                $animal['photos']['domestication'] = \AnimalPhoto::where('section', 'domestication')->where('animal_id', $animal['id'])->take(1)->get();

                if (count($animal['photos']['domestication']) < 1) {
                    $animal['photos']['domestication'] = \AnimalPhoto::inRandomOrder()->whereNotIn('id', $photosUsedIds)->where('animal_id', $animal['id'])->where('cover', false)->take(1)->get();
                    if (count($animal['photos']['domestication'])>0) {
                        $photosUsedIds[] = $animal['photos']['domestication'][0]['id'];
                    }
                }

            }
            //ad banner instead the nutrition image
/*            $animal['photos']['nutrition'] = \AnimalPhoto::where('section', 'nutrition')->where('animal_id', $animal['id'])->take(1)->get();

            if (count($animal['photos']['nutrition']) < 1) {
                $animal['photos']['nutrition'] = \AnimalPhoto::inRandomOrder()->whereNotIn('id', $photosUsedIds)->where('animal_id', $animal['id'])->where('cover', false)->take(1)->get();
                if (count($animal['photos']['nutrition'])>0) {
                    $photosUsedIds[] = $animal['photos']['nutrition'][0]['id'];
                }
            }*/

            $animal['photos']['population'] = \AnimalPhoto::where('section', 'population')->where('animal_id', $animal['id'])->take(1)->get();
            if (count($animal['photos']['population']) < 1) {
                $animal['photos']['population'] = \AnimalPhoto::inRandomOrder()->whereNotIn('id', $photosUsedIds)->where('animal_id', $animal['id'])->where('cover', false)->take(1)->get();
                if (count($animal['photos']['population'])>0) {
                    $photosUsedIds[] = $animal['photos']['population'][0]['id'];
                }
            }
            $animal['photos']['title'] = \AnimalPhoto::where('cover', false)->where('animal_id', $animal['id'])->whereNotIn('id', $photosUsedIds)->orderBy('order', 'desc')->take(5)->get();
            //$animal['related'] = \Taxonomy::children(25);
            //creating array of characteristics to balance them properly on the main page
            $chars = [
                'population_size' =>'Population size',
                'life_span' =>'Life Span',
                'speed' =>'TOP SPEED',
                'weight' =>'WEIGHT',
                'height' =>'HEIGHT',
                'lengths' =>'LENGTH',
                'wingspan' =>'WINGSPAN'
            ];
            foreach ($chars as $metakey => $char){
                if (!empty($animal['meta'][$metakey])){
                    $animal['characteristics'][]= [$char, $animal['meta'][$metakey] ];
                }
            }

            $related_animals_ids= [];
            for ($i=count($animal['taxonomies'])-1;$i>0;$i--){ //loop each taxonomy item in taxonomy hierarchy from lowest unit to highest -subspiecy to  kingdom
                foreach (\Taxonomy::children($animal['taxonomies'][$i]['id']) as $taxonomy_id ){ //select all children from each original topology and loop
                    $temp_related=\Animal::where('taxonomy_id',$taxonomy_id)->where('id','!=',$id)->inRandomOrder()->get(['id'])->toArray(); //animals with given taxonomy
                    if(!empty($temp_related)) {
                        foreach ($temp_related as $temp_animal_id) {
                            //dd($temp_related,$temp_animal_id['id']);
                            if(!in_array($temp_animal_id['id'],$related_animals_ids)) { //check if already in the array
                                array_push($related_animals_ids, $temp_animal_id['id']);
                                if (count($related_animals_ids)==8){break 3;} //exit after we selected 8 animals
                            }
                        }
                    }
                }

            }
            $animal['related']=Animal::wherein('id',$related_animals_ids)->with('cover')->get()->toArray();
            //calculation of the content height in order to determine which template to render
            /*
             * 1x+1y+2z+2w больше или равно 19
            х кількість рядків alternative names
            y кількість елементів таксономіїї
            z - кількість рядків з характеристиками
            w количество рядков в title
            */
            $magic_number = (floor(strlen($animal['meta']['title'])/10)+1)*2 + round(count($animal['characteristics'])/2)*2+(count($animal['taxonomies'])+1)+(floor(strlen($animal['meta']['common_names'])/40)+1);
            $animal['magic_number']= $magic_number;
            if ($magic_number<19){
                $animal['template_id']=1;
            }else{
                $animal['template_id']=2;
            }


            //dd($animal);

        }catch (Exception $e){
	        $statusCode = 400;
	    }

	    if(\Request::ajax() || \Request::wantsJson()){
        	return \Response::json($animal, $statusCode);
	    }else{
	        return $animal;
	    }
	}

	

}
