<?php

class Taxonomy extends \Eloquent {

	protected $table = 'taxonomies';
	//protected $fillable = [];
	//public $timestamps = false;

	public static $rules = array(
        'name' => 'required',
        'type' => 'required',
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


	public function parent()
    {
        return $this->belongsTo('Taxonomy', 'parent_id');
    }


    public static function breadcrumbs($taxonomy_id, $init_taxonomy_id = null, $breadcrumbs = null) {
        
        if(!isset($breadcrumbs)){
            $breadcrumbs = array();
            $init_taxonomy_id = $taxonomy_id;
        }
        
        $taxonomy = \Taxonomy::find($taxonomy_id);

        if($taxonomy){
            $breadcrumbs[] = array('id' => $taxonomy->id, 'name' => $taxonomy->name, 'url' => $taxonomy->url, 'type' => $taxonomy->type);
            return self::breadcrumbs($taxonomy->parent_id, $init_taxonomy_id, $breadcrumbs);
        }else{
            // $breadcrumbs = \Cache::remember('breadcrumbs_'.$init_taxonomy_id, 24*60, function() use ($breadcrumbs)
            // {
            //   return array_reverse($breadcrumbs);
            // });

            $breadcrumbs = array_reverse($breadcrumbs);
            return $breadcrumbs;
        }
    }


    public static function children($taxonomy_id, $parent = null) {
        
        $children = array();

        if(!isset($parent)){
            $children[] = $taxonomy_id;
        }

        $taxonomies = Taxonomy::select('id')->where('parent_id', '=', $taxonomy_id)->get()->toArray();
     
        foreach ($taxonomies as $taxonomy) {
            $gchildren = self::children($taxonomy['id'], true);

            if( !empty($gchildren) ) {
                $children = array_merge($children, $gchildren);
            }

        }

        $taxonomies_ids = array();
        foreach ($taxonomies as $taxonomy) {
            $taxonomies_ids[] = $taxonomy['id'];
        }

        $children = array_merge($children, $taxonomies_ids);

        return $children;
    }
}