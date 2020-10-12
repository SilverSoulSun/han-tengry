<?php

//namespace App\Models;

class Video extends \Eloquent
{
    protected $table = 'animals_videos';
    //protected $fillable = [];
    //public $timestamps = false;

    public static $rules = array(
        'animal_id' => 'required',
        'type' => 'required',
        'video_id' => 'required',
        'title' => 'required',

    );
    public function animal()
    {
        return $this->belongsTo('animal');
    }
}
