<?php


return array(


	'title' => 'Users',
	'single' => 'user',
	'model' => 'User',
	//'form_width' => 500,

	'action_permissions'=> array(
	    'delete' => function($model)
	    {
	        return false;
	    },
	    'create' => function($model)
	    {
	        return false;
	    },
	),

	'columns' => array(
	    'id',
	    'admin',
	    'name',
		'email',
		'created_at',

	    
	),

	'edit_fields' => array(
	    'name' => array(
	        'title' => 'Name',
	        'type' => 'text'
	    ),
	    'email' => array(
	        'title' => 'Mail',
	        'type' => 'text'
	    ),
	    'admin' => array(
	        'title' => 'admin',
	        'type' => 'bool',
        ),
	    
	),

	'filters' => array(
	    'id',
	    'email',
	    'name',
	),

);