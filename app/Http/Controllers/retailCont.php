<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RetailInfo as retail;
use App\picture as picture;
use App\User as user;
use App\city as city;
use Auth;
use Illuminate\Hashing\BcryptHasher as hasher;
use DB;
use Validator;
class retailCont extends Controller
{
	
// Add Retail Global Function
	function newRetail(Request $req){
		$retail = new retail;
		$picarray = $req->pics;
		$retail->adresse_retail = $req->ret_address;
		$retail->zipcode = $req->ret_post_zip;
		$retail->phone = $req->ret_post_phone;
		$retail->rent = $req->ret_loc;
		$retail->price = $req->ret_price;
		$retail->surface =  $req->ret_surface;
		$retail->type = $req->ret_type;
		$retail->city_id = $req->ret_city;
		$retail->info = $req->ret_info;	
			if( $req->ret_type != "la" || $req->ret_type != "st"){
				$retail->nbRooms = $req->ret_rooms;
				$retail->balc = $req->ret_balc;
				$retail->gar = $req->ret_gara;
				$retail->furn = $req->ret_furn;	
			}
				$user = (Auth::user());
			if($user->retails()->save($retail)){
				$ret = true;
			}
		if(sizeof($picarray)){
			for($i = 0; $i < sizeof($picarray); $i++)	{
				$pics[$i] = new picture;
				$pics[$i]->picture_name = $picarray[$i];
			}
		
		if($retail->pics()->saveMany($pics)){
			$ret = true;
		}
		}
		if($ret == true){
			return redirect("/dashboard");
		}	
	}
	function updRetail(Request $req){

	}
	function delRetail($id){
		
	}
	function viewRetail(){
		
	}
	function listRetail($offset){
		$objArray;
		$retail = retail::limit(10)->offset(0)->get();
		$obj = new \stdClass;
		for($i = 0 ; $i < sizeof($retail) ; $i++){
			$obj = new \stdClass;
			//$obj->address = $retail[0]->adresse_retail;
			//$obj->zipcode = $retail[0]->zipcode;
			$obj->id = $retail[$i]->id;
			$obj->rent = $retail[$i]->rent."_rt";
			$obj->price = $retail[$i]->price;
			$obj->type = $retail[$i]->type;	
			$obj->dt = $retail[$i]->dt;
			//$obj->phone = $retail[0]->phone;
			//$obj->surface = $retail[0]->surface;
			$obj->city = $retail[$i]->city_id;
			$obj->pics = $retail[$i]->pics->first();
			$obj->furn = $retail[$i]->furn;
			$obj->balc = $retail[$i]->balc;
			$obj->gar = $retail[$i]->gar;	
			$objArray[$i] = $obj;
		}
			//return dd($obj);
			return view("retail.partmat")->with(["objArray" => $objArray]);	
	}
	function listMyRetail($num){
		$user = (Auth::user());
		$id = $user->id;
		$sqlRetail = "SELECT *,DATE_FORMAT(created_at,'%d-%m-%Y') as dt FROM retail_infos WHERE user_id = ".$id." LIMIT ".$num.",".($num+5);
		$cityRetail = "SELECT name_ar FROM cities WHERE id=";
		$picsRetail = "SELECT picture_name FROM  pictures WHERE retail_info_id = ";
		$objArray;
		$retail  = DB::select($sqlRetail);
		for($i = 0 ; $i < sizeof($retail) ; $i++){
			$obj = new \stdClass;
			//$obj->address = $retail[0]->adresse_retail;
			//$obj->zipcode = $retail[0]->zipcode;
			$obj->id = $retail[$i]->id;
			$obj->rent = $retail[$i]->rent."_rt";
			$obj->price = $retail[$i]->price;
			$obj->type = $retail[$i]->type;	
			$obj->dt = $retail[$i]->dt;
			//$obj->phone = $retail[0]->phone;
			//$obj->surface = $retail[0]->surface;
			$obj->city = DB::select($cityRetail.$retail[$i]->city_id)[0]->name_ar;
			$obj->pics = DB::select($picsRetail.$retail[$i]->id." LIMIT 0,1")[0]->picture_name;
				//if($cityRetail->furn != null)
				//if($cityRetail->balc != null)
				//if($cityRetail->gar != null)
			
			$objArray[$i] = $obj;
		}
			return view("retail.list")->with(["objArray" => $objArray]);
		
		
	}
	function updrtl($id){
			// we need to get informations on the retail id
			// the list of pictures,
			// all the changes should be uploaded 
		$cities = city::all();
		$retail = retail::where("id","=",$id)->get();
		$pics = $retail[0]->pics;
		return view("retail.update")->with(["id"=>$id, "cities"=>$cities, "retail"=>$retail[0],"pics" => $pics]);
	
	}
	function updateRetail($elem, $id, Request $req){
		// we need to Validate the request
			// we need get the Object
		// 06 68 23 67 47
		$retail = retail::where("id", "=", $id)->get();
		$validator = Validator::make($req->all(), [
		"adresse_retail" => "between:6,100",
		"zipcode" => "size:5|numeric",
		"phone" => "size:10|numeric",
		"price" => "min:0",
		"surface" => "min:0",
		]);
		if($validator->fails() == false){
				// Saving the Object	
			retail::where("id","=",$id)->update($req->all());
		}
		else {
			return $validator->errors();
		}
		
	}
	function getRetailInfo($id){
		$infos = retail::where("id", $id)->first();
		// we need to get the pictures
		$pics = $infos->pics;
		return View("retail.info")->with(["infos"=>$infos,"pics"=>$pics]);
	}
	
}
