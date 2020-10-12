<?php

class Animal extends \Eloquent {

	protected $table = 'animals';
	//protected $fillable = [];
	//public $timestamps = false;


    public static $rules = array(
        'name' => 'required',
        'scientific_name' => 'required',
        'url' => 'required',
        'category_id' => 'required',
        'taxonomy_id' => 'required',
    );

    protected static function boot()
    {
        static::saving(function ($model) {
            $model->url = \Controller::makeUrl($model->url);

            return true;
        });
    }

	public function getRouteKeyName()
	{
	    return 'url';
	}


    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = strtolower($value);
    }




    public function scopeTaxonomy($query, $taxonomy_id = null)
    {   
        if(!empty($taxonomy_id)){
            $taxonomies = Taxonomy::children($taxonomy_id);
            //dd($taxonomies);
            return $query->whereIn('animals.taxonomy_id', $taxonomies); 
        }   
    }


    public function scopeEnvironment($query, $environment_id = null)
    {
        if(!empty($environment_id)){
            $env = \Environment::find($environment_id);
            if ($env->type == 'country'){
                $tbl ='animals_countries'; // add union with introduced countries for correct display of countries
            }else{
                $tbl = 'animals_'.$env->type.'s';
            }
            return $query->join($tbl,$tbl.'.animal_id', '=', 'animals.id')->where($tbl.'.environment_id', $env->id);
            
        }
    }



    public function scopeProperty($query, $property_id = null)
    {   
        //dd($property);
        if(!empty($property_id)){
            $property = \Property::find($property_id);
            
            switch ($property->type) {
                case 'population_status':
                    return $query->where('animals.population_status_id', $property->id); 
                break;

                case 'current_population_trend':
                    return $query->where('animals.current_population_trend_id', $property->id); 
                break;

                case 'biome':
                    return $query->join('animals_biomes', 'animals_biomes.animal_id', '=', 'animals.id')->where('animals_biomes.property_id', $property->id); 
                break;

                case 'diet':
                    return $query->join('animals_diets', 'animals_diets.animal_id', '=', 'animals.id')->where('animals_diets.property_id', $property->id); 
                break;

                case 'look':
                    return $query->join('animals_looks', 'animals_looks.animal_id', '=', 'animals.id')->where('animals_looks.property_id', $property->id); 
                break;

                case 'climate_zone':
                    return $query->join('animals_climate_zones', 'animals_climate_zones.animal_id', '=', 'animals.id')->where('animals_climate_zones.property_id', $property->id); 
                break;

                case 'social_behavior':
                    return $query->join('animals_social_behaviors', 'animals_social_behaviors.animal_id', '=', 'animals.id')->where('animals_social_behaviors.property_id', $property->id); 
                break;

                case 'seasonal_behavior':
                    return $query->join('animals_seasonal_behaviors', 'animals_seasonal_behaviors.animal_id', '=', 'animals.id')->where('animals_seasonal_behaviors.property_id', $property->id);
                    break;

                case 'lifestyle':
                    return $query->join('animals_lifestyles', 'animals_lifestyles.animal_id', '=', 'animals.id')->where('animals_lifestyles.property_id', $property->id); 
                break;

                case 'active_day_period':
                    return $query->join('animals_active_day_periods', 'animals_active_day_periods.animal_id', '=', 'animals.id')->where('animals_active_day_periods.property_id', $property->id); 
                break;

                case 'prey':
                    return $query->join('animals_preys', 'animals_preys.animal_id', '=', 'animals.id')->where('animals_preys.property_id', $property->id); 
                break;

                case 'predator':
                    return $query->join('animals_predators', 'animals_predators.animal_id', '=', 'animals.id')->where('animals_predators.property_id', $property->id); 
                break;

                case 'mating_behavior':
                    return $query->join('animals_mating_behaviors', 'animals_mating_behaviors.animal_id', '=', 'animals.id')->where('animals_mating_behaviors.property_id', $property->id); 
                break;

                case 'other':
                    return $query->join('animals_others', 'animals_others.animal_id', '=', 'animals.id')->where('animals_others.property_id', $property->id); 
                break;
                case 'domestication':
                    return $query->join('animals_domestication', 'animals_domestication.animal_id', '=', 'animals.id')->where('animals_domestication.property_id', $property->id);
                break;


            }
        }   
    }




    public function cover()
    {
        return $this->belongsTo('AnimalPhoto', 'id', 'animal_id')->where('cover', true);
    }

    public function habitat_map()
    {
        return $this->belongsTo('HabitatMap', 'id', 'animal_id');
    }
	
    public function meta()
    {
        return $this->belongsTo('AnimalMeta',  'id', 'animal_id')->where('lang', LaravelLocalization::getCurrentLocale());
    }

    // public function metaShort()
    // {
    //     return $this->belongsTo('AnimalMeta',  'id', 'animal_id')->select(array('animals_metas.title'))->where('lang', LaravelLocalization::getCurrentLocale());
    // }


    public function references()
    {
        return $this->hasMany('Reference')->where('lang', LaravelLocalization::getCurrentLocale());
    }

    public function videos()
    {
        return $this->hasMany('Video');
    }

    public function category()
    {
        return $this->belongsTo('Category');
    }

    public function taxonomy()
    {
        return $this->belongsTo('Taxonomy');
    }


    public function population_status()
    {
        return $this->belongsTo('Property', 'population_status_id', 'id');
    }

    public function current_population_trend()
    {
        return $this->belongsTo('Property', 'current_population_trend_id', 'id');
    }





    public function diets()
    {
        return $this->belongsToMany('Property', 'animals_diets');
    }

    public function biomes()
    {
        return $this->belongsToMany('Property', 'animals_biomes');
    }

    public function looks()
    {
        return $this->belongsToMany('Property', 'animals_looks');
    }

    public function lifestyles()
    {
        return $this->belongsToMany('Property', 'animals_lifestyles');
    }


    public function social_behaviors()
    {
        return $this->belongsToMany('Property', 'animals_social_behaviors');
    }

    public function seasonal_behaviors()
    {
        return $this->belongsToMany('Property', 'animals_seasonal_behaviors');
    }

    public function mating_behaviors()
    {
        return $this->belongsToMany('Property', 'animals_mating_behaviors');
    }

    public function climate_zones()
    {
        return $this->belongsToMany('Property', 'animals_climate_zones');
    }


    public function preys()
    {
        return $this->belongsToMany('Animal', 'animals_preys', 'animal_id', 'property_id')->with('cover'); ;
    }
    public function active_day_periods()
    {
        return $this->belongsToMany('Property', 'animals_active_day_periods');
    }
    public function predators()
    {
        return $this->belongsToMany('Animal', 'animals_predators', 'animal_id', 'property_id')->with('cover'); ;
    }
    public function others()
    {
        return $this->belongsToMany('Property', 'animals_others');
    }
    public function domestication()
    {
        return $this->belongsToMany('Property', 'animals_domestication');
    }



    public function continents()
    {
        return $this->belongsToMany('Environment', 'animals_continents');
    }

    public function subcontinents()
    {
        return $this->belongsToMany('Environment', 'animals_subcontinents');
    }

    public function countries()
    {
        return $this->belongsToMany('Environment', 'animals_countries');
    }

    public function introduced_countries()
    {
        return $this->belongsToMany('Environment', 'animals_introduced_countries');
    }

    public function lakes()
    {
        return $this->belongsToMany('Environment', 'animals_lakes');
    }

    public function rivers()
    {
        return $this->belongsToMany('Environment', 'animals_rivers');
    }

    public function islands()
    {
        return $this->belongsToMany('Environment', 'animals_islands');
    }

    public function mountains()
    {
        return $this->belongsToMany('Environment', 'animals_mountains');
    }

    public function regions()
    {
        return $this->belongsToMany('Environment', 'animals_regions');
    }

    public function deserts()
    {
        return $this->belongsToMany('Environment', 'animals_deserts');
    }

    public function oceans()
    {
        return $this->belongsToMany('Environment', 'animals_oceans');
    }

    public function seas()
    {
        return $this->belongsToMany('Environment', 'animals_seas');
    }


}