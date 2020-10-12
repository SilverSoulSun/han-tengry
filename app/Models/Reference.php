<?php

class Reference extends \Eloquent {

	protected $table = 'references';
	//protected $fillable = [];
	//public $timestamps = false;

	public static $rules = array(
        'animal_id' => 'required',
	    'type' => 'required',
	    'lang' => 'required',
	    'url' => 'required',
	    'name' => 'required',
    );

	public function animal()
    {
        return $this->belongsTo('animal');
    }
}