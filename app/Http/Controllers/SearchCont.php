<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RetailInfo as retail;
use App\city as city; 
class SearchCont extends Controller
{
    //
	function search(Request $req, $city, $type, $rent){
		$cities = city::all();
		$arr = Array();
		if($city != "-1") $arr['city_id'] = $city;	
		if($type != "-1") $arr['type'] = $type;
		if($rent != "-1") $arr['rent'] = $rent;
		$data = retail::where($arr);
		if(isset($_GET['srt'])){
		// then sort the request based in the sort data
		//desc or asc 
		// column number
		$srtN = $_GET['srt'];
		if($srtN == 1) $data = $data->orderBy("created_at", "desc"); 
		if($srtN == 2) $data = $data->orderBy("price", "asc"); 
		if($srtN == 3) $data = $data->orderBy("price", "desc"); 
		if($srtN == 4) $data = $data->orderBy("surface", "asc"); 
		if($srtN == 5) $data = $data->orderBy("surface", "desc"); 
		}
		$data = $data->paginate(10);	
		return View("retail.search")->with(["data" => $data, "cities"=>$cities, "citySel"=>$city, "rent"=>$rent, "type"=>$type]);	
	
	
	}
	function advancedSort(){
		
	}	
}	


