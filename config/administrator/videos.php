<?php

$video_categories = ['Documentary', 'In Natural Habitat', 'Funny','Lifestyle' ];
$types = ['Youtube', 'Vimeo'];

return array(


	'title' => 'Videos',
	'single' => 'video',
    //'model' => 'Reference',
	'model' => 'Video',
	//'form_width' => 400,

	// 'action_permissions'=> array(
	//     'delete' => function($model)
	//     {
	//         return false;
	//     }
	// ),

	'columns' => array(
	    'id',
	    'animal' => array(
		    'title' => "animal",
		    'relationship' => 'animal', //this is the name of the Eloquent relationship method!
		    'select' => "(:table).name",
		),
	    'type',
	    'video_id',
	),

	'edit_fields' => array(
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name',
		),

	    'type' => array(
	        'title' => 'type',
	        'type' => 'enum',
	        'options' => $types,
	        'value' => 'Youtube',
	    ),
		
		'video_category' => array(
	        'title' => 'Category',
	        'type' => 'enum',
	        'options' => $video_categories,

	    ),
		
		'title' => array('title' => 'Title', 'type' => 'text'),
		'video_id' => array('title' => 'Video ID', 'type' => 'text'),


	),

	'filters' => array(
	    'id',
	    'title',
	    'video_id',
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		    'value' => @$_GET['animal_id'],
		),
	),

);