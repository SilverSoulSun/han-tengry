<?php

class HabitatMap extends \Eloquent {

	protected $table = 'habitat_maps';
	//protected $fillable = ['key', 'value'];
	//public $timestamps = false;

	public static $rules = array(
        'animal_id' => 'required',
	    'image' => 'required',
    );

	public function animal()
    {
        return $this->belongsTo('animal');
    }

}