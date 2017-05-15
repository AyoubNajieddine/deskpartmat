@extends("layouts.master")
@section("content")
<link type="text/css" href="{{ URL::to('css/home.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::to('js/home.js') }}"></script>
	<div id="sideRtHome" class="pull-right">
	<div class="searchCls">
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
	<div class="infos">
		<div id="subBox">
			<form action="subs" method="post">
				<h3>{{ trans("home.subs") }}</h3>
				<input class="form-control" name="email_sub" placeholder="{{ trans('login.user_holder') }}">
				<button class="btn btn-md btn-primary">{{ trans("home.subButton") }}</button>
			</form>
		</div>
		<div class="infoBox">	
			<span style="background-color:#cce1ff;" class="infoImgSpn glyphicon glyphicon-info-sign pull-right"></span>
			<h4 class="pull-right">{{ trans("home.infoBox1") }}<br><small>{{ trans("home.infoBox1sub") }}</small></h4>
		</div>
		<div class="infoBox">
			<img src="http://www.ciperfect.com/images/carte.png"  style="background-color:#537bb4;" class="infoImg pull-right" />
			<h4 class="pull-right">{{ trans("home.infoBox2") }}<br><small>{{ trans("home.infoBox2sub") }}</small></h4>
		</div>
		<div class="infoBox">
			<span style="background-color:#96d99d;" class="infoImgSpn glyphicon glyphicon-search pull-right"></span>
			<h4 class="pull-right">{{ trans("home.infoBox3") }}<br><small>{{ trans("home.infoBox3sub") }}</small></h4>
		</div>
	</div>
	</div>
	<div class="pull-left" id="sideLtHome">
		<div class="imgExp">
		<img src="{{ URL::to('icons/casablanca.jpg') }}" />
		<h1>{{ trans("cities.170") }}<br>
		<small>5000 {{ trans("dashboard.retail") }}</small>
		</h1>	
		</div>
		<div class="imgExp">
		<img src="{{ URL::to('icons/marrakech.jpg') }}" />	
		<h1>{{ trans("cities.173") }}<br><small>3400 {{ trans("dashboard.retail") }}</small></h1>	
		</div>
		<div class="imgExp">
		<img src="{{ URL::to('icons/rabat.jpg') }}" />	
		<h1>{{ trans("cities.171") }}<br><small>200 {{ trans("dashboard.retail") }}</small></h1>	
		</div>
	</div>
@endsection
