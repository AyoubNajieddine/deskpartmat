<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    //
	function retail(){
		return $this->belongTo("App\RetailInfo");
	}
}
