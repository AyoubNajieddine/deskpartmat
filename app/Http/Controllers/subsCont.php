<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\subscriber as subscriber;
use Lang;
class subsCont extends Controller
{
    //
		function addSub(Request $req){
			$validator = Validator::make($req->all(),[
					"email" => "required|email|unique:subscribers",
			]);
			$ret = 1; 
			if(!$validator->fails()){
				// add new email
				$subscriber = new subscriber;
				$subscriber->email = $req->email;
				 if($req->notify == true) { $subscriber->linked = 1; }
				if($subscriber->save()){
				$ret = Lang::get("home.sucSub");
				}
			}
			else {
				$ret =  $validator->errors();
			}
			return $ret;
		}
		function linkSub(Request $req){
				
		}
		function unlinkSub(Request $req){

		}
}
