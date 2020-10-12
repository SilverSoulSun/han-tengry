<?php

class Property extends \Eloquent {

	protected $table = 'properties';
	//protected $fillable = [];
	//public $timestamps = false;

	public static $rules = array(
        'type' => 'required',
	    'name' => 'required',
	    'url' => 'required',
	    'name_en' => 'required',
	    'title_en' => 'required',
    );

    public function setUrlAttribute($value)
    {
        $this->attributes['url'] = strtolower($value);
    }

    protected static function boot()
    {
        static::saving(function ($model) {
            $model->url = \Controller::makeUrl($model->url);

            return true;
        });
    }


    public static function populationStatuses($ps, $url = null){

    	$statuses = [
    				'ne' => ['query' => 'Not evaluated'],
    				'dd' => ['query' => 'Data deficient'],
    				'lc' => ['query' => 'Least concern'],
    				'nt' => ['query' => 'Near Threatened'],
    				'vu' => ['query' => 'Vulnerable'],
    				'en' => ['query' => 'Endangered'],
    				'cr' => ['query' => 'Critically endangered'],
    				'ew' => ['query' => 'Extinct in the wild'],
    				'ex' => ['query' => 'Extinct'],
    				];

    	foreach ($statuses as $key => $status) {
    		if( strpos( $ps['name'],  $status['query'] ) !== false ) {
			    $statuses[$key]['active'] = true;
                if($url){ $statuses[$key]['url'] = $url; }
			    break;
			}


    	}

    	return $statuses;
    }
}


