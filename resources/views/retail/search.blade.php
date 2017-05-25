@extends("layouts.master")
@section("content")
<link type="text/css" href="{{ URL::to('css/search.css') }}" rel="stylesheet">
<script src="{{ URL::to('js/search.js') }}" type="text/javascript"></script>
	<div id="sideRtSearch" class="pull-right">	
	<div class="searchcls">
		<!-- Search Division -->
			<span class="glyphicon glyphicon-search"></span><span>{{ trans('home.search_tit') }}</span><br>
			<small>{{ trans('home.title') }}</small><br><br>
			
			<form action="/search" >
				  <div class="form-group">
					<select name="ret_city" class="form-control">							
					<option value="-1">{{ trans('new.city') }}</option>
						@foreach($cities as $city)
						<option value="{{ $city->id }}">{{ trans("cities.".$city->id) }}</option>
						@endforeach
					</select>
				  </div>
				    <div class="form-group">
					<select name="ret_loc" class="form-control">
						<option value="-1">{{ trans('new.rentbuy') }}</option>
						<option value="1">{{ trans('new.rent') }}</option>
						<option value="2">{{ trans('new.buy') }}</option>
					</select>
				    </div>
				    <div class="form-group">
					<select name="ret_type" class="form-control">
						<option value="-1">{{ trans('new.type') }}</option>
						<option value="ap" >{{ trans('new.ap')}}</option>
						<option value="vi">{{ trans('new.vi')}}</option>
						<option value="ho" >{{ trans('new.ho')}}</option>
						<option value="fl" >{{ trans('new.fl')}}</option>
						<option value="st" >{{ trans('new.st')}}</option>
						<option value="la" >{{ trans('new.la')}}</option>
					</select>
				  </div>
			<button class="btn btn-md btn-info"><span class="glyphicon glyphicon-search"></span> {{ trans('home.search') }}</button>
			</form>
	</div>
	
			<div id="advancedSearch">
				<div class="panel panel-default">
					<div class="panel-heading">Simplfy your research</div>
					<div class="panel-body">
						<a  data-toggle="collapse" data-target="#sortLst"><span>&#9666;</span> Sort</a><br>
						<ul class="collapse" id="sortLst">
						<li><input type="radio" value="1"  name="sortby"/> {{ trans("home.newest") }} </li>
						<li><input type="radio" value="2"  name="sortby"/> {{ trans("new.minprice") }}</li>
						<li><input type="radio" value="3"  name="sortby"/> {{ trans("new.maxprice") }}</li>
						<li><input type="radio" value="4"  name="sortby"/> {{ trans("new.minsurf") }}</li>
						<li><input type="radio" value="5"  name="sortby"/> {{ trans("new.maxsurf") }}</li>
						</ul>
						<br><a ><span>&#9666;</span> filter by price</a><br>
						<br><a ><span>&#9666;</span> filter by surface</a><br>
						<br><a ><span>&#9666;</span>filter by nbRooms</a><br>
						<br><a><span>&#9666;</span>filter by carac</a><br>
						
					</div>
				</div>
			</div>
	</div>
	<div id="sideLtSearch" style="" class="pull-left">	
	   @if($data->total() >  0 && $data->currentPage() <= $data->total())
	<div id="searchData">
		@foreach($data as $retail)
			<?php // code goes here   ?>


			<div class="retailElem panel panel-default">
	<img src="@if(count($retail->pics) > 0) /thumbs/{{ ($retail->pics)[0]->picture_name }} @else /icons/home.png @endif" class="imgSide pull-right"/>
			<div class="initData pull-right">
			<span class="priceAmount">{{ $retail->price}} {{ trans("new.currency") }}</span><br>
			<span><span class="glyphicon glyphicon-map-marker"></span>{{ trans("cities.".$retail->city_id) }}</span><br>
			<span>{{ $retail->surface}} m<sup>2</sup></span><br><br>
			@if($retail->type != "la" && $retail->type != "st")
			<div class="addInfoBox">
				<?php // check for the number of rooms ?>
					@if($retail->nbRooms != NULL )<strong class="label label-default"><span class="glyphicon glyphicon-bed" style="color:black;"></span> {{ $retail->nbRooms}}</strong>@endif
					@if($retail->gar == 1) <strong class="label label-default"> {{ trans("new.gara") }} </strong> @endif
					@if($retail->balc == 1) <strong class="label label-default"> {{ trans("new.balc") }} </strong> @endif
					@if($retail->furn == 1) <strong class="label label-default"> {{ trans("new.furn") }} </strong> @endif
			</div>
			@endif
			</div>
			<div class="priceInfo pull-left">
			<span class="typerent">{{ trans("new.".$retail->type) }}</span>
			<span class="typerent">{{ trans("dashboard.".$retail->rent."_rt") }}</span><br><br><br>	
			<a href="/info/{{ $retail->id }}" class="btn btn-info pull-left">{{ trans("new.more") }} <span class="glyphicon glyphicon-menu-left"></span></a>
			</div>

			</div>
		@endforeach
	</div><br>
			
		@if($data->hasMorePages() == true || $data->previousPageUrl() != null)
	<div class="panel-default panel-body pagin panel">
	<center>
	@if($data->nextPageUrl() != null ) <a href="{{ $data->nextPageUrl() }}" class="glyphicon glyphicon-menu-right" dir='ltr'></a> @endif
	<b>{{ trans("home.page") }} {{ $data->currentPage() }}</b>
	@if($data->previousPageUrl() != null) <a href="{{ $data->previousPageUrl() }}"  class="glyphicon glyphicon-menu-left" dir="ltr"></a> @endif
	</center>
	</div>	
		@endif
	   @else
		<div class="panel panel-default ">
			<center><h3>{{ trans("home.nothing") }}</h3></center>
	       </div>
	@endif
	</div>
@endsection
