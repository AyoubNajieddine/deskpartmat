<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\message as message;
use Validator;
class messgCont extends Controller
{
    //
	 function sendMessage($id, Request $req){
			$validator = Validator::make($req->all(),[
			"message" => "required|max:150",
			]);	
			if(!$validator->fails()){
				// creating a new message object
				$message = new message;
				$message->message = $req->message;
				$message->user_id = $id;
				$message->save();
				return 1;
			}
			else {
				return json_encode($validator->errors(), JSON_UNESCAPED_UNICODE);
			}
	 }
	function deleteMessage(){

	}
}
