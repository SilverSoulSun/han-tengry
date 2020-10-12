<?php

class AnimalPhoto extends \Eloquent {

	protected $table = 'animals_photos';
	//protected $fillable = [];
	//public $timestamps = false;

	public static $rules = array(
        'animal_id' => 'required',
	    'name' => 'required',
	    'image' => 'required',
    );

	public function animal()
    {
      return $this->belongsTo('animal');
    }

    public static function fileNewname($filename){
        if ($pos = strrpos($filename, '.')) {
               $name = substr($filename, 0, $pos);
               $ext = substr($filename, $pos);
        } else {
               $name = $filename;
        }

        $newpath = $filename;
        $newname = $filename;
        $counter = 1;
        while (self::where('image', $newpath)->exists()) {
               $newname = $name .'-'. $counter . $ext;
               $newpath = $newname;
               $counter++;
         }

        return $newname;
    }

    // public function setImageAttribute($value)
    // {
    //     $path = public_path() . '/uploads/animals/photos/original/';
    //     $image_name = \Controller::makeUrl($value);
    //     $image_name = \Controller::fileNewname($path, $image_name);
    //     $this->attributes['image'] = $image_name;
    // }
}