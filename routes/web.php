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
    $cities = App\city::all();
    return view('home')->with(["cities" => $cities]);
});
Route::post("/register","userCont@register");
Route::post("/login",  "userCont@login");
Route::get("/logout", "userCont@logout");
Route::get("/search/{city}/{type}/{rent}", "SearchCont@search");
Route::get("/info/{id}", "retailCont@getRetailInfo");
Route::group(["middleware" => "auth"], function(){
	Route::post("/nm", "userCont@updName");
	Route::post("/eml", "userCont@updEmail");	
	Route::post("/pwd", "userCont@updPassword"); 
	Route::get("/delcnt", "userCont@delUser");
	Route::get("/list", "retailCont@listMyRetail");
	Route::get("/new", function(){
		$cities = App\city::all();
		return view("retail.new")->with(["cities"=>$cities]); 
	});
	Route::get("/new/frm/{tp}", function($tp){	
			return view("retail.frmdyn")->with(["tp"=>$tp]);
	});
	Route::post("/delret", "retailCont@delRetail");
	Route::post("/addRetail", "retailCont@newRetail");
	Route::get("/updret/{id}", "retailCont@updrtl");
	Route::post("/updret/update/{elem}/{id}","retailCont@updateRetail");
	Route::post("/upld", "pictCont@addPics");
});

