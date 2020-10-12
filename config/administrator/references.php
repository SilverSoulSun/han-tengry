<?php

$langs = ['all', 'en', 'ru'];
$types = ['other', 'wikipedia', 'redlist', 'other'];

return array(


	'title' => 'References',
	'single' => 'reference',
	'model' => 'Reference',
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
	    'name',	
	    'url',	  
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
	        'value' => 'other',
	    ),
		
		'lang' => array(
	        'title' => 'lang',
	        'type' => 'enum',
	        'options' => $langs,
	        'value' => 'en',
	    ),
		
		'name' => array('title' => 'Name', 'type' => 'text'),
		'url' => array('title' => 'url', 'type' => 'text'),


	),

	'filters' => array(
	    'id',
	    'name',
	    'url',
	    'lang' => array(
	        'title' => 'lang',
	        'type' => 'enum',
	        'options' => $langs,
	    ),
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		    'value' => @$_GET['animal_id'],
		),
	),

);