<?php


Auth::routes();
Route::get('logout', '\SiteController@logout');

Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect' ]
],
function()
{
    Route::get('/', '\SiteController@viewHome');

    if(LaravelLocalization::getCurrentLocale() == 'en'){
        $url = Request::segment(1);
    }else{
        $url = Request::segment(2);
    }

    $animal = Animal::where('url', '=', $url)->first();
    if($animal){ 
        Route::get('{animal}/{any?}', 'SiteController@viewAnimal'); 
    }

    $category = Category::where('url', '=', $url)->first();
    if($category){ 
        Route::get('{category}/{any?}', 'SiteController@viewCategory'); 
    }

    $taxonomy = Taxonomy::where('url', '=', $url)->first();
    if($taxonomy){ 
        Route::get('{taxonomy}/{any?}', 'SiteController@viewTaxonomy'); 
    }

    $property = Property::where('url', '=', $url)->first();
    if($property){ 
        Route::get('{property}/{any?}', 'SiteController@viewProperty'); 
    }

    $environment = Environment::where('url', '=', $url)->first();
    if($environment){ 
        Route::get('{environment}/{any?}', 'SiteController@viewEnvironment'); 
    }


});

Route::get('video', function(){
    return view('site.animal.test_video');
});

//admin

Route::group(
[
    'prefix' => 'data',
    'middleware' => [ 'admin' ]
],
function()
{

    Route::any('animals', function () { return \AdminController::getAnimals();  });
    Route::any('properties', function () { return \AdminController::getProperties();  });
    Route::any('taxonomies', function () { return \AdminController::getTaxonomies();  });
    Route::any('categories', function () { return \AdminController::getCategories();  });

    Route::any('cropper', function () { return \AdminController::cropImage();  });
    Route::any('import-properties', function () { return \AdminController::importProperties();  });
    Route::any('import-geography', 'AdminController@importGeography');
    Route::any('get-photos', function () { return \AdminController::getPhotos();  });
    Route::any('import-photos', function () { return \AdminController::importPhotos();  });
});

View::composer(array('administrator::layouts.default'), function($view)
{
    //$custom_pages = ['admin.cropper', 'admin.properties-import', 'admin.photos-import'];
    if ($view->page or $view->dashboard == true)
    {
        $view->js += array(
            'myjs' => '/js/admin.js'
        );

        $view->css += array(
            'mycss' => '/css/admin.css'
        );
        
    }else{

        $view->js += array(
            'myjs' => '/js/administrator.js'
        );

        $view->css += array(
            'mycss' => '/css/administrator.css'
        );
    }
});

// View::composer(['admin.test', 'admin.dashboard'], function($view)
// {
//     $view->data = AdminController::getDashboard();
// });
