<?php

class Environment extends Illuminate\Database\Eloquent\Model {

	protected $table = 'environments';
	protected $fillable = ['type',
        'name',
        'url' ,
        'name_en' ,
        'title_en',
        'index',
        'url'];
	public $timestamps = false;
	//public $id;

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


    public function animals()
    {
        return $this->belongsTo('Animal');
    }

    public function parent()
    {
        return $this->belongsTo('Environment', 'parent_id');
    }

    protected $guarded = [];
    
}