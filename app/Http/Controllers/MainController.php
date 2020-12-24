<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MapPoint;
use App\Models\ProjectMap;
use App\Models\ObjectMap;
use App\Models\DrawingMap;
use DateTime;
use DB;
use DataTables;
use Response;
use Input;

class Maincontroller extends Controller
{
	public function ajaxmaps()
	{
		$marker = MapPoint::select('ms_object.name',
			'ms_object.lat',
			'ms_object.lang',
			'ms_object.type',
			'ms_object.used' 
		)->get();  
		return Response::json($marker);
	}
 	
 	public function getSearchObject(Request $request) {
          $data = MapPoint::where('name', 'LIKE', '%'.$request->keyword.'%')
          ->with('object')
      ->whereOr('description', 'LIKE', '%'.$request->keyword.'%')
      ->get();
    	$q = $request->keyword;
			return compact('data'); 
        return response()->json($response, 200);
    }

	public function getSearch(Request $request)
	{ $data['type'] = ObjectMap::get();
		  $data['count_project'] = ProjectMap::count(); 
		 $keyword = $request->keyword;
		return view('pages.hasilcari',compact('data','keyword'));
	}	

	public function index(Request $request)
	{
		$openMap = MapPoint::with('object')->get();
		//$data['privatemap'] = DrawingMap::with('object')->get();
		$data['type'] = ObjectMap::get();
		//$dataPrivate =  json_decode($data['privatemap']);  
		//$arrpriv[] = array(); 
 		//$arr[] = array();
 		// foreach ($dataPrivate as $privmap)
		// {
		// 	$arrpriv[] = array(
		// 		'id' => $privmap->id,
		// 		'title' => $privmap->name,
 		// 		'address' => $privmap->type_object,
		// 		'type' => $privmap->object->type,
		// 		'icon' => $privmap->object->path_image,
		// 		'koordinat' => str_replace (array('[', ']','"',''), '' , $privmap->coordinates)
		// 		);
		// }  
		foreach ($openMap as $row)
		{
			$arr[] = array(
				'id' => $row->id,
				'title' => $row->name,
				'description' => $row->type,
				'address' => $row->name,
				'type' => $row->object->type,
				'icon' => $row->object->path_image,
				'koordinat' => $row->lat.",".$row->lang
				);
		}

		// $finalMap  = collect($arr)->merge($arrpriv);
		$finalMap  = $arr;
		// $rrayfin = $finalMap[];
		// return compact('finalMap');

		$data['listMap'] =  $finalMap ; 
 		$data['count_project'] = ProjectMap::count(); 
		return view('pages.index',compact('data'));
	}
}
