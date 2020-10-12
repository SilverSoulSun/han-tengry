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

return array(


	'title' => 'Habitat Maps',
	'single' => 'map',
	'model' => 'HabitatMap',
	'form_width' => 400,

	'action_permissions'=> array(
	    'delete' => function($model)
	    {
	        return false;
	    }
	),

	'columns' => array(
	    'id',
	    'animal' => array(
		    'title' => "animal",
		    'relationship' => 'animal', //this is the name of the Eloquent relationship method!
		    'select' => "(:table).name",
		),
	    'name',	  
	),

	'edit_fields' => array(
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		),
		
	    

	    'image' => array(
		    'title' => 'Image',
		    'description' => '',
		    'type' => 'image',
		    'location' => public_path() . '/uploads/animals/maps/original/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 50,
	     	'sizes' => array(
		        array(1000, 1000, 'auto', public_path() . '/uploads/animals/maps/full/', 80),
		        array(400, 400, 'auto', public_path() . '/uploads/animals/maps/medium/', 80),
		        array(200, 200, 'auto', public_path() . '/uploads/animals/maps/small/', 80),
		    )
		),

		'name' => array('title' => 'Name', 'type' => 'text'),
	    'description' => array('title' => 'description', 'type' => 'textarea'),

		'author' => array('title' => 'author', 'type' => 'text'),
		'author_profile' => array('title' => 'author profile', 'type' => 'text'),

	    'license' => array(
	        'title' => 'License',
	        'type' => 'enum',
	        'options' => $licenses ,
	    ),

	    'original_reference' => array('title' => 'original reference', 'type' => 'text'),

	),

	'filters' => array(
	    'id',
	    'name',
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		),
	),

);