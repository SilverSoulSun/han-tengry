<?php

$licenses = [
			'All Rights Reserved',
			'Attribution License', 
			'Attribution-NoDerivs License', 
			'Attribution-ShareAlike License',
			'Attribution-NonCommercial-NoDerivs License',
			'Attribution-NonCommercial License',
			'Attribution-NonCommercial-ShareAlike License',
			'Public Domain Dedication (CC0)',
			'Public Domain Mark',
			'No known copyright restrictions',
			'United States Government Work',
			];

$sections = [
			'disrtibution',
			'lifestyle',
			'nutrition',
			'mating',
			'population',
			'ecological-niche',
			'domestication'
			];


return array(


	'title' => 'Photos',
	'single' => 'photo',
	'model' => 'AnimalPhoto',
	'form_width' => 400,

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
	    'image' => array(
		    'title' => 'Image',
		    'output' => '<img src="/uploads/animals/photos/medium/original/(:value)" width="430"  />',
		),
	    'name',
	    'order',
        'cover'
	),

	'edit_fields' => array(

		'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		),
		
	    'name' => array('title' => 'Name', 'type' => 'text'),
	    'order' => array('title' => 'order', 'type' => 'text'),

	    'description' => array('title' => 'description', 'type' => 'textarea'),
	    
	    'section' => array(
	        'title' => 'section',
	        'type' => 'enum',
	        'options' => $sections ,
	    ),

	    'cover' => array(
	        'title' => 'cover',
	        'type' => 'bool',
        ),

	    'image' => array(
		    'title' => 'image',
		    'description' => '',
		    'type' => 'image',
		    'location' => public_path() . '/uploads/animals/photos/original/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 50,
	     	'sizes' => array(
		        array(600, 600, 'crop', public_path() . '/uploads/animals/photos/full/1x1/', 80),
		        array(400, 400, 'crop', public_path() . '/uploads/animals/photos/medium/1x1/', 80),
		        array(300, 300, 'crop', public_path() . '/uploads/animals/photos/small/1x1/', 80),

		        array(1600, 800, 'crop', public_path() . '/uploads/animals/photos/full/2x1/', 80),
		        //array(800, 400, 'crop', public_path() . '/uploads/animals/photos/medium/2x1/', 80),
		        //array(400, 200, 'crop', public_path() . '/uploads/animals/photos/small/2x1/', 80),

                array(750, 600, 'crop', public_path() . '/uploads/animals/photos/full/1.25x1/', 80),

		        array(1600, 1200, 'auto', public_path() . '/uploads/animals/photos/full/original/', 80),
		        array(800, 600, 'auto', public_path() . '/uploads/animals/photos/medium/original/', 80),
		        //array(400, 300, 'auto', public_path() . '/uploads/animals/photos/small/original/', 80),
		    )
		),


		'author' => array('title' => 'author', 'type' => 'text'),
		'author_profile' => array('title' => 'author profile', 'type' => 'text'),

	    'license' => array(
	        'title' => 'License',
	        'type' => 'enum',
	        'options' => $licenses ,
	    ),

	    'original_reference' => array('title' => 'original reference', 'type' => 'text'),

	    'behavior' => array('title' => 'behavior', 'type' => 'text'),
	    'age' => array('title' => 'age', 'type' => 'text'),

	    'latitude' => array('title' => 'latitude', 'type' => 'text'),
	    'longitude' => array('title' => 'longitude', 'type' => 'text'),

	    'place' => array('title' => 'place', 'type' => 'text'),
	    'place_specific' => array('title' => 'place specific', 'type' => 'text'),

	    'date' => array(
	    	'type' => 'datetime',
		    'title' => 'date',
		    'date_format' => 'yy-mm-dd', //optional, will default to this value
		    'time_format' => 'HH:mm:ss',
	    ),



	),

	'filters' => array(
	    'id',
	    'name',
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		    'value' => @$_GET['animal_id'],
		),
		'cover' => array(
	        'title' => 'cover',
	        'type' => 'bool',
        ),
        'license' => array(
	        'title' => 'license',
	        'type' => 'enum',
	        'options' => $licenses,
	    ),
	    'section' => array(
	        'title' => 'section',
	        'type' => 'enum',
	        'options' => $sections,
	    ),
	),

);