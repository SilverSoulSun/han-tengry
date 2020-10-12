<?php


return array(


	'title' => 'Animals',
	'single' => 'animal',
	'model' => 'Animal',
	'form_width' => 500,

	'action_permissions'=> array(
	    'delete' => function($model)
	    {
	        return false;
	    }
	),

	'columns' => array(
	    'id',
	    'name',
	    'featured',
	    'category' => array(
		    'title' => "Category",
		    'relationship' => 'category',
		    'select' => "(:table).name",
		),	    
	),

	'edit_fields' => array(
	    'name' => array(
	        'title' => 'Name',
	        'type' => 'text'
	    ),
	    'scientific_name' => array(
	        'title' => 'Scientific name',
	        'type' => 'text'
	    ),
	    'url' => array(
	        'title' => 'Url',
	        'type' => 'text'
	    ),
        'featured' => array(
            'title' => 'Featured',
            'type' => 'bool'
        ),


	    'category' => array(
		    'type' => 'relationship',
		    'title' => 'Category',
		    'name_field' => 'name', 
		),
		'taxonomy' => array(
		    'type' => 'relationship',
		    'title' => 'taxonomy',
		    'name_field' => 'name', 
		),



		

		// 'cover' => array(
		//     'title' => 'Cover',
		//     'description' => '',
		//     'type' => 'image',
		//     'location' => public_path() . '/uploads/animals/covers/original/',
		//     'naming' => 'random',
		//     'length' => 20,
		//     'size_limit' => 50,
	 //     	'sizes' => array(
		//         array(600, 600, 'crop', public_path() . '/uploads/animals/covers/full/1x1/', 80),
		//         array(400, 400, 'crop', public_path() . '/uploads/animals/covers/medium/1x1/', 80),
		//         array(300, 300, 'crop', public_path() . '/uploads/animals/covers/small/1x1/', 80),

		//         array(1600, 800, 'crop', public_path() . '/uploads/animals/covers/full/2x1/', 80),
		//         array(800, 400, 'crop', public_path() . '/uploads/animals/covers/medium/2x1/', 80),
		//         array(400, 200, 'crop', public_path() . '/uploads/animals/covers/small/2x1/', 80),


		//         array(1600, 1200, 'auto', public_path() . '/uploads/animals/covers/full/original/', 80),
		//         array(800, 600, 'auto', public_path() . '/uploads/animals/covers/medium/original/', 80),
		//         array(400, 300, 'auto', public_path() . '/uploads/animals/covers/small/original/', 80),
		//     )
		// ),


		'looks' => array(
		    'type' => 'relationship',
		    'title' => 'looks',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('look');
		    },
		),
		'climate_zones' => array(
		    'type' => 'relationship',
		    'title' => 'climate_zone',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('climate_zone');
		    },
		),
		'biomes' => array(
		    'type' => 'relationship',
		    'title' => 'biome',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('biome');
		    },
		),


		'social_behaviors' => array(
		    'type' => 'relationship',
		    'title' => 'social_behavior',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('social_behavior');
		    },
		),
        'seasonal_behaviors' => array(
            'type' => 'relationship',
            'title' => 'seasonal_behavior',
            'name_field' => 'name',
            'options_filter' => function($query)
            {
                $query->orderBy('order', 'desc')->whereType('seasonal_behavior');
            },
        ),
		'lifestyles' => array(
		    'type' => 'relationship',
		    'title' => 'lifestyle',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('lifestyle');
		    },
		),
		'active_day_periods' => array(
		    'type' => 'relationship',
		    'title' => 'active_day_period',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('active_day_period');
		    },
		),

		'diets' => array(
		    'type' => 'relationship',
		    'title' => 'diet',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('diet');
		    },
		),
		'preys' => array(
		    'type' => 'relationship',
		    'title' => 'prey',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('name', 'asc');
		    },
		),
		'predators' => array(
		    'type' => 'relationship',
		    'title' => 'predator',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('name', 'asc');
		    },
		),
		
		
		
		
		'mating_behaviors' => array(
		    'type' => 'relationship',
		    'title' => 'mating_behavior',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('mating_behavior');
		    },
		),
		'population_status' => array(
		    'type' => 'relationship',
		    'title' => 'population status',
		    'name_field' => 'name',
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('population_status');
		    }, 
		),

		

		'current_population_trend' => array(
		    'type' => 'relationship',
		    'title' => 'current population trend',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('current_population_trend');
		    },
		),
        'domestication' => array(
            'type' => 'relationship',
            'title' => 'Domestication',
            'name_field' => 'name',
            'options_filter' => function($query)
            {
                $query->orderBy('order', 'desc')->whereType('domestication');
            },
        ),
		
		
		'others' => array(
		    'type' => 'relationship',
		    'title' => 'other',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->orderBy('order', 'desc')->whereType('other');
		    },
		),


		'continents' => array(
		    'type' => 'relationship',
		    'title' => 'continents',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('continent');
		    },
		),

        'subcontinents' => array(
            'type' => 'relationship',
            'title' => 'subcontinents',
            'name_field' => 'name',
            'options_filter' => function($query)
            {
                $query->whereType('subcontinent');
            },
        ),

        'introduced_countries' => array(
            'type' => 'relationship',
            'title' => 'introduced countries',
            'name_field' => 'name',
            'options_filter' => function($query)
            {
                $query->whereType('country'); //interesting what would happen
            },
        ),

		'countries' => array(
		    'type' => 'relationship',
		    'title' => 'countries',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('country');
		    },
		),

		'lakes' => array(
		    'type' => 'relationship',
		    'title' => 'lakes',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('lake');
		    },
		),

		'rivers' => array(
		    'type' => 'relationship',
		    'title' => 'rivers',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('river');
		    },
		),

		'islands' => array(
		    'type' => 'relationship',
		    'title' => 'islands',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('island');
		    },
		),

		'mountains' => array(
		    'type' => 'relationship',
		    'title' => 'mountains',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('mountain');
		    },
		),

		'regions' => array(
		    'type' => 'relationship',
		    'title' => 'regions',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('region');
		    },
		),

		'deserts' => array(
		    'type' => 'relationship',
		    'title' => 'deserts',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('desert');
		    },
		),

		'oceans' => array(
		    'type' => 'relationship',
		    'title' => 'oceans',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('ocean');
		    },
		),

		'seas' => array(
		    'type' => 'relationship',
		    'title' => 'seas',
		    'name_field' => 'name', 
		    'options_filter' => function($query)
		    {
		        $query->whereType('sea');
		    },
		),



		// 'habitat_map' => array(
		//     'title' => 'habitat map',
		//     'description' => '',
		//     'type' => 'image',
		//     'location' => public_path() . '/uploads/animals/maps/original/',
		//     'naming' => 'random',
		//     'length' => 20,
		//     'size_limit' => 5,
	 	//     	// 	'sizes' => array(
		//     //     array(60, 40, 'crop', public_path() . '/uploads/animals/maps/small/', 80),
		//     //     array(300, 200, 'crop', public_path() . '/uploads/animals/maps/medium/', 80),
		//     //     array(300, 200, 'crop', public_path() . '/uploads/animals/maps/full/', 80),
		//     // )
		// ),
	),

	'filters' => array(
	    'id',
	    'name',
	    'category' => array(
	        'type' => 'relationship',
	        'title' => 'Category',
	        'name_field' => 'name',
	    ),
        'featured' => array(
            'title' => 'featured',
            'type' => 'bool',
        )
	),

);