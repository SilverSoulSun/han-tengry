<?php

namespace Api;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class PhotoController extends \Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($conditions = null)
	{
		try{

	        $statusCode = 200;
	        $response = [];

	        $page = \Input::get('page', 1);
	        $perPage = \Input::get('perPage', 100);

	        $animal_id = \Input::get('animal_id', $conditions['animal_id']);
	        
	        $query = \AnimalPhoto::where('animal_id', $animal_id);

	        $total = $query->count();
	        $photos = $query->orderBy('order', 'desc')->get()->toArray();

	        $response = new Paginator($photos, $total, $perPage, $page, [
	            'path'  => \Request::url(),
	            'query' => \Request::query(),
	        ]);

	 
	    }catch (Exception $e){
	        $statusCode = 400;
	    }

	    if(\Request::ajax() || \Request::wantsJson()){
        	return \Response::json($response, $statusCode);
	     }else{
	        return $response;
	     }

	}


	public function show($id)
	{
		try{
			
        	$statusCode = 200;
        	$response = [];

	    }catch (Exception $e){
	        $statusCode = 400;
	    }

	    if(\Request::ajax() || \Request::wantsJson()){
        	return \Response::json($animal, $statusCode);
	     }else{
	        return $animal->toArray();
	     }
	}

	

}
