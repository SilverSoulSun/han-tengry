<?php

class SiteController extends Controller
{
    public $baseUrl = [];

    public function __construct()
    {
        \Debugbar::disable();

        if(LaravelLocalization::getCurrentLocale() == 'en'){
            $this->baseUrl = Request::segment(1);
        }else{
            $this->baseUrl = Request::segment(2);
        }

        $catalogCategories = \Category::where('active', true)->get();
        View::share('catalogCategories', $catalogCategories);

        View::share('gcl', LaravelLocalization::getCurrentLocale());        
    }


    public function viewHome(){
        $page_data = [];

        if(Setting::where('key', 'aod_id')->where('updated_at', '>', Carbon::now()->subDay())->exists()){
            $aod = Setting::where('key', 'aod_id')->first();
            $aod_id = $aod['value'];
        }else{
            $aod = Animal::inRandomOrder()->first();
            Setting::updateOrCreate(['key' => 'aod_id'], ['value' => $aod->id]);
            $aod_id = $aod->id;
        }

        $page_data['aod'] = \Animal::with('meta', 'cover')->where('id', $aod_id)->first();
        $page_data['animals'] = \Animal::with('meta', 'cover')->orderBy('id', 'desc')->take(5)->get();
        $page_data['properties'] = \Property::where('index', true)->orderBy('views', 'desc')->take(7)->get();

        foreach ($page_data['properties'] as $i => $property) {
            $page_data['properties'][$i]['animals_count'] = Animal::property($property->id)->count();
        }

        return view('site.home')->with('page_data', $page_data)->with('page_name', 'home');
    }

    public function viewCatalog($type){

        $page_data = [];
        $page_data['page_type'] = $type;


        switch ($type) {
            case 'category':
                $category = \Category::where('url', $this->baseUrl)->first();
                $catalog = $category;
                
                $conditions['category_id'] = $category->id;
                $page_data['page_id'] = $category->id;
                $page_data['animals'] =  app('\Api\AnimalController')->index($conditions);
            break;
            case 'taxonomy':
                $taxonomy = \Taxonomy::where('url', $this->baseUrl)->first();
                $catalog = $taxonomy;

                $conditions['taxonomy_id'] = $taxonomy->id;
                $page_data['page_id'] = $taxonomy->id;
                $page_data['animals'] =  app('\Api\AnimalController')->index($conditions);

                $page_data['breadcrumbs'] =  \Taxonomy::breadcrumbs($taxonomy->id);
            break;
            case 'property':
                $property = \Property::where('url', $this->baseUrl)->first();
                $catalog = $property;

                $conditions['property_id'] = $property->id;
                $page_data['page_id'] = $property->id;
                $page_data['animals'] =  app('\Api\AnimalController')->index($conditions);
            break;
            case 'environment':
                $environment = \Environment::where('url', $this->baseUrl)->first();
                $catalog = $environment;

                $conditions['environment_id'] = $environment->id;
                $page_data['page_id'] = $environment->id;
                $page_data['animals'] =  app('\Api\AnimalController')->index($conditions);
            break;
        }

        if(!\BrowserDetect::isBot()){
            $catalog->timestamps = false;
            $catalog->views++;
            $catalog->save();
        }
        $page_data['info'] = $catalog->toArray();

        return view('site.catalog')->with('page_data', $page_data)->with('page_name', 'catalog');
    }


    public function viewAnimal($url){
    
        $page_data = [];

        $animal = animal::where('url', $this->baseUrl)->first();
        $animal = app('\Api\AnimalController')->show($animal->id);

        //dd($animal);

        $page_data['breadcrumbs'] =  \Taxonomy::breadcrumbs($animal['taxonomy_id']);

        foreach (LaravelLocalization::getSupportedLocales() as $lang => $locale) {
            $am = AnimalMeta::select('id', 'lang')->where('lang', $lang)->where('animal_id', $animal['id'])->first();
            if($am){
                $page_data['admin']['metas'][] = ['id' => $am->id, 'lang' => $am->lang];
            }else{
                $page_data['admin']['metas'][] = ['id' => 'new', 'lang' => $lang];
            }
        }

        $hm = HabitatMap::where('animal_id', $animal['id'])->first();
        if($hm){
            $page_data['admin']['habitat_map'] = ['id' => $hm->id];
        }else{
            $page_data['admin']['habitat_map'] = ['id' => 'new'];
        }
        $featured= \Animal::where('featured',1)-> with('cover')->inRandomOrder()->take(8)->get() ->toArray();
        //dd($featured);
        return view('site.animal')->with('animal', $animal)->with('page_data', $page_data)->with('page_name', 'animal')->with('featured',$featured);
    }


    public function viewCategory(){ return $this->viewCatalog('category'); }
    public function viewTaxonomy(){ return $this->viewCatalog('taxonomy'); }
    public function viewProperty(){ return $this->viewCatalog('property'); }
    public function viewEnvironment(){ return $this->viewCatalog('environment'); }

    public function logout(){
        \Auth::logout();
        return redirect('/');
    }

    
}
