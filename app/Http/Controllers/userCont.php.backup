<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User as User;
use Illuminate\Hashing\BcryptHasher as hasher;
use Validator;
class userCont extends Controller
{
    //
	function login(Request $req){

		// Validator Example
		$validator = Validator::make($req->all(),[
			"email" => "required",
			"password" => "required",
			
		]);
	if(!$validator->fails()){ // checking the validator
		if($req['remember'] == true){
				$rem = true;
		}
		else {
				$rem = false;
		}
		if(Auth::attempt(["email"=>$req['email'], "password"=>$req['password']], $rem)){
			return redirect("/dashboard");	
		}else {
			// we have our error and we have 
			$validator->errors()->add("rg_login","rong_user_error");
			return redirect()->back()->withErrors($validator->errors());	
		}
	}else {
			// return redirect whit errors 
			return redirect()->back()->withErrors($validator->errors());
	}
	}
	function register(Request $req){
	   if(Auth::check() == false){
		$validator = Validator::make($req->all(),[
			"email" => "required|unique:users|email",
			"password" => "required|min:6",
			"full_name" => "required|max:100",
		]);	 
		if(!$validator->fails()){
		$user = new User;	
		$user->full_name = $req['full_name'];
		$user->password = bcrypt($req['password']);
		$user->email = $req['email'];
		if($user->save()){
			Auth::login($user);
			return redirect("/dashboard");
		}else {
			return "0";
		}
		}
		else {
			return redirect()->back()->withErrors($validator->errors());
		}
		}
		
	}
	
	function logout(){
		Auth::logout();
		return redirect("/login");
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
				return redirect("/upd");
			}
			else {
				// an other Error Message
			}
		}else {
			// error Message
			$validator->errors()->add("email_not_match", "email_match");
			return back()->withErrors($validator);
		}
		}
		else {
			return back()->withErrors($validator->errors());
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
				$user->password = bcrypt($old_password);
				if($user->save()){
					// in case success
					return redirect("/upd");
				}else {
					// password update fail
				}
			}
			else {
				// old password is not the same
			$validator->errors()->add("rong_old_password", "rong_old_password");
			return redirect()->back()->withErrors($validator->errors());
				
			}
		}else {
			$validator->errors()->add("password_not_match", "password_not_match");
			return redirect()->back()->withErrors($validator->errors());
		}	
	}else {
			return redirect()->back()->withErrors($validator->errors());
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
				return redirect("/upd");
			}else {
				// error Message
					
			}		
		}else {
			return back()->withErrors($validator->errors());
		}
	}
	function delUser(){
		$id = Auth::user()->id;
		User::destroy([$id]);
		Auth::logout();
		return redirect("/login");

	}
}
