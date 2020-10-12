<?php

class AnimalMeta extends \Eloquent {

	protected $table = 'animals_metas';
	//protected $fillable = [];
	//public $timestamps = false;

	public static $rules = array(
        'animal_id' => 'required',
	    'lang' => 'required',
	    'title' => 'required',
    );

	public function animal()
    {
        return $this->belongsTo('animal');
    }
}