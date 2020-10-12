<?php

$langs = ['original', 'en', 'ru'];

return array(


	'title' => 'Animals Meta',
	'single' => 'meta',
	'model' => 'AnimalMeta',
	'form_width' => 600,


	'action_permissions'=> array(
	    'delete' => function($model)
	    {
	        return false;
	    }
	),

	'columns' => array(
	    'id',
	    'lang',
	    'animal' => array(
		    'title' => "animal",
		    'relationship' => 'animal', //this is the name of the Eloquent relationship method!
		    'select' => "(:table).name",
		),	
	    'title',	   
	),

	'edit_fields' => array(

		'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		),
		
		'lang' => array(
	        'title' => 'lang',
	        'type' => 'enum',
	        'options' => $langs,
	        'value' => 'en',
	    ),

	    'title' => array('title' => 'title', 'type' => 'text'),

	    'appearance' => array('title' => 'appearance', 'type' => 'textarea'),

	    'common_names' => array('title' => 'common_names', 'type' => 'text'),


	    'height_full' => array('title' => 'height full', 'type' => 'text'),
	    'height' => array('title' => 'height', 'type' => 'text', 'limit' => 12),

	    'lengths_full' => array('title' => 'length full', 'type' => 'text'),
	    'lengths' => array('title' => 'length', 'type' => 'text', 'limit' => 12),
	    'wingspan' => array('title' => 'wingspan', 'type' => 'text', 'limit' => 12),

	    'weight_full' => array('title' => 'weight full', 'type' => 'text'),
	    'weight' => array('title' => 'weight', 'type' => 'text', 'limit' => 12),

	    'life_span_full' => array('title' => 'life_span full', 'type' => 'text'),
	    'life_span' => array('title' => 'life_span', 'type' => 'text', 'limit' => 12),

	    'speed_full' => array('title' => 'speed full', 'type' => 'text'),
	    'speed' => array('title' => 'speed', 'type' => 'text', 'limit' => 12),

	    
	    'desrtibution' => array('title' => 'desrtibution', 'type' => 'textarea'),
	    'habits' => array('title' => 'habits', 'type' => 'textarea'),
	    'nutrition' => array('title' => 'nutrition', 'type' => 'textarea'),
	    'preys' => array('title' => 'preys', 'type' => 'textarea'),
	    'predators' => array('title' => 'predators', 'type' => 'textarea'),

	    'group_name' => array('title' => 'group_name', 'type' => 'text', 'limit' => 50),
	    
	    'mating_habits' => array('title' => 'mating_habits', 'type' => 'textarea'),
	    'reproduction_season' => array('title' => 'reproduction_season', 'type' => 'text'),
	    'pregnancy_duration' => array('title' => 'pregnancy_duration', 'type' => 'text', 'limit' => 12),
	    'incubation_period' => array('title' => 'incubation period', 'type' => 'text', 'limit' => 12),
	    'baby_name' => array('title' => 'baby_name', 'type' => 'text', 'limit' => 16),
	    'female_name' => array('title' => 'female_name', 'type' => 'text', 'limit' => 16),
	    'male_name' => array('title' => 'male_name', 'type' => 'text', 'limit' => 16),
	    'baby_carrying' => array('title' => 'baby_carrying', 'type' => 'text', 'limit' => 12),
	    'clutch_size' => array('title' => 'clutch size', 'type' => 'text', 'limit' => 12),
	    'independent_age' => array('title' => 'independent_age', 'type' => 'text', 'limit' => 12),

	    'population_threats' => array('title' => 'population_threats', 'type' => 'textarea'),
	    'population_number' => array('title' => 'population_number', 'type' => 'textarea'),
	    'population_size' => array('title' => 'population size', 'type' => 'text', 'limit' => 12),
	    'ecological_niche' => array('title' => 'ecological_niche', 'type' => 'textarea'),
	    'domestication' => array('title' => 'domestication', 'type' => 'textarea'),

	    'facts' => array('title' => 'facts', 'type' => 'textarea'),


	),

	'filters' => array(
	    'id',
	    'title',
	    'lang' => array(
	        'title' => 'lang',
	        'type' => 'enum',
	        'options' => $langs,
	    ),
	    'animal' => array(
		    'type' => 'relationship',
		    'title' => 'animal',
		    'name_field' => 'name', 
		),
	),

);