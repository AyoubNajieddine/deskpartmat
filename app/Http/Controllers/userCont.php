<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User as User;
use Auth;
use Lang;
use Illuminate\Hashing\BcryptHasher as hasher;
class userCont extends Controller
{
    //
	function register(Request $req){
		$ret = new \stdClass;
		$validate = Validator::make($req->all(), [
			"email" => "required|unique:users|email",
			"password" => "required|min:6",
			"full_name" => "required|max:100",
		]);
		if($validate->fails() == false){
		    $user = new User;
		    $user->full_name = $req->full_name;
		    $user->password = bcrypt($req->password);
		    $user->email = $req->email;
		    if($user->save()){
				// check if the user is save
		     Auth::login($user);
	             $ret->tp = 1; // success number
		     $ret->res = " ";
		    }
		   else $ret->tp = 0; $ret->res = "Server Error";	
		}
		else {
		 $ret->tp = 2;$ret->res = $validate->errors();
		}
		return json_encode($ret, JSON_UNESCAPED_UNICODE);
			
	}
	function login(Request $req){
		$ret = new \stdClass;
		$validate = Validator::make($req->all(), [
			"email" => "required|email",
			"password" => "required", 
		]);
		if($validate->fails() == false){
			if(Auth::attempt(["email"=>$req->email, "password"=>$req->password])){
				$ret->tp = 1; // success 	
				$ret->res = " ";	
			}
			else {
				$ret->tp = 0;
				$ret->res = Lang::get("login.rg_login");
			}
		}
		else {
			$ret->tp = 2;
			$ret->res  =  $validate->errors();
		}
		return json_encode($ret,JSON_UNESCAPED_UNICODE);
	}
	function logout(){
		Auth::logout();
		return redirect("/");
	}
	function updEmail(Request $req){
			// we still need to validate the form
		$validator =  Validator::make($req->all(), [
			"email" => "required|unique:users",
		]);
		$email = $req['email'];
		$email_comf = $req['cr_email'];
		if(!$validator->fails()){
		if($email == $email_comf){
			// then we gonna add
			$user = Auth::user();
			$user->email = $email;
			if($user->save()){
				return 1;
			}
			else {
				// an other Error Message
				return 0;
			}
		}else {
			// error Message
			$validator->errors()->add("email_not_match", Lang::get("updeml.email_match"));
			return $validator->errors();
		}
		}
		else {
			return $validator->errors();
		}
	}
	function updPassword(Request $req){
			// we still need to validate the form
			$validator = Validator::make($req->all(), [
				"password" => "required|min:6",
				"cm_password" => "required",
			]);
			$old_password = $req['cr_password'];
			$password = $req['password'];	
			$password_comf = $req['cm_password'];
			if(!$validator->fails()){
		if($password == $password_comf){
			$user = Auth::user();
			$hash = new hasher;
			if($hash->check($old_password, $user->password) == true){
				// in case success
				$user->password = bcrypt($password);
				if($user->save()){
					// in case success
					return 1;
				}else {
					// password update fail
					return 0;
				}
			}
			else {
				// old password is not the same
			$validator->errors()->add("rong_old_password", Lang::get("updpwd.rong_old_password"));
			return $validator->errors();
				
			}
		}else {
			$validator->errors()->add("password_not_match", Lang::get("updpwd.password_not_match"));
			return $validator->errors();
		}	
	}else {
			return $validator->errors();
		}
	}
	function updName(Request $req){
			// we still need to validate the form
			$validator = Validator::make($req->all(), [
			"fname" => "required|max:50",
			"lname" => "required|max:50",
			]);
			$first_name = $req['fname'];
			$last_name = $req['lname'];
			$user = Auth::user();
			$user->full_name = $first_name." ".$last_name;
		if(!$validator->fails()){
			if($user->save()){
				return 1;
			}else {
				  // error Message
				return 0;		
			}		
		}else {
			return $validator->errors();
		}
	}
	function delUser(){
		$id = Auth::user()->id;
		User::destroy([$id]);
		Auth::logout();
		return redirect("/login");

	}
}
