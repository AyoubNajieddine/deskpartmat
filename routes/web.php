<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::post("/register","userCont@register");
Route::post("/login",  "userCont@login");
Route::get("/logout", "userCont@logout");
Route::group(["middleware" => "auth"], function(){
	Route::post("/nm", "userCont@updName");
	Route::post("/eml", "userCont@updEmail");	
	Route::post("/pwd", "userCont@updPassword"); 
	Route::get("/delcnt", "userCont@delUser");
});
