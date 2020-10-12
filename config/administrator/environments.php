<?php

$types = array(
			'continent',
            'subcontinent',
			'country',
	        'lake',
	        'river',
	        'island',
	        'mountain',
	        'region',
	        'desert',
	        'ocean',
	        'sea',
			);

return array(


	'title' => 'Environments',
	'single' => 'environment',
	'model' => 'Environment',
	'form_width' => 400,


	'action_permissions'=> array(
	    // 'delete' => function($model)
	    // {
	    //     return false;
	    // }
	),

	'columns' => array(
	    'id',
	    'type',
	    'parent' => array(
		    'type' => 'relationship',
		    'title' => 'Parent',
		    'name_field' => 'name', 
		),
	    'name',	
	    'url', 
	    'index',   
	),

	'edit_fields' => array(
		'type' => array(
	        'title' => 'Type',
	        'type' => 'enum',
	        'options' => $types ,
	    ),
	    'parent' => array(
		    'type' => 'relationship',
		    'title' => 'Parent',
		    'name_field' => 'name', 
		),
	    'name' => array(
	        'title' => 'Name',
	        'type' => 'text'
	    ),
	    'index' => array(
		    'type' => 'bool',
		    'title' => 'index (robots)',
		),
	    'url' => array(
	        'title' => 'Url',
	        'type' => 'text'
	    ),


	    'color' => array(
	        'title' => 'Color',
	        'type' => 'color',
	    ),

	    'name_en' => array('title' => 'name_en', 'type' => 'text'),
	    'title_en' => array('title' => 'title_en', 'type' => 'text'),
	    'description_en' => array('title' => 'description_en', 'type' => 'textarea'),
	    'source_en' => array('title' => 'source_en', 'type' => 'text'),

	    'name_ru' => array('title' => 'name_ru', 'type' => 'text'),
	    'title_ru' => array('title' => 'title_ru', 'type' => 'text'),
	    'description_ru' => array('title' => 'description_ru', 'type' => 'textarea'),
	    'source_ru' => array('title' => 'source_ru', 'type' => 'text'),

	    'cover' => array(
		    'title' => 'Cover',
		    'description' => '',
		    'type' => 'image',
		    'location' => public_path() . '/uploads/catalog/covers/original/',
		    'naming' => 'random',
		    'length' => 20,
		    'size_limit' => 50,
	     	'sizes' => array(
		        array(600, 600, 'crop', public_path() . '/uploads/catalog/covers/full/1x1/', 80),
		        array(400, 400, 'crop', public_path() . '/uploads/catalog/covers/medium/1x1/', 80),
		        array(300, 300, 'crop', public_path() . '/uploads/catalog/covers/small/1x1/', 80),

		        array(1600, 800, 'crop', public_path() . '/uploads/catalog/covers/full/2x1/', 80),
		        array(800, 400, 'crop', public_path() . '/uploads/catalog/covers/medium/2x1/', 80),
		        array(400, 200, 'crop', public_path() . '/uploads/catalog/covers/small/2x1/', 80),
		    )
		),

	),

	'filters' => array(
	    'id',
	    'type' => array(
	        'title' => 'Type',
	        'type' => 'enum',
	        'options' => $types,
	    ),
	    'name',
	    'url',
	    'index' => array(
	        'title' => 'index',
	        'type' => 'bool',
        ),
	),

);