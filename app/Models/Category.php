<?php

class Category extends \Eloquent {

	protected $table = 'categories';
	//protected $fillable = [];
	//public $timestamps = false;

	public static $rules = array(
        'name' => 'required',
	    'url' => 'required',
	    'name_en' => 'required',
	    'title_en' => 'required',
    );
	
	public function getRouteKeyName()
	{
	    return 'url';
	}

	protected static function boot()
    {
        static::saving(function ($model) {
            $model->url = \Controller::makeUrl($model->url);

            return true;
        });
    }

	public function setUrlAttribute($value)
    {
        $this->attributes['url'] = strtolower($value);
    }

}