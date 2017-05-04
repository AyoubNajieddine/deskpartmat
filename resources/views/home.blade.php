<link type="text/css" href="{{ URL::to('css/home.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::to('js/home.js') }}"></script>
@extends("layouts.master")

@section("content")
	<div id="sideRtHome" class="pull-right">
	<div class="searchCls">
		<!-- Search Division -->
			<span class="glyphicon glyphicon-search"></span><span> Search For Houses</span><br>
			<small>all Citiies, Houses Lands,Cars</small><br><br>

			
			<form action="search" >
				  <div class="form-group">
					<select name="ret_city" class="form-control">
						<option value="-1">{{ trans('new.city') }}</option>
						<option value="">{{ trans("cities.") }}</option>
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
		<div class="infoBox">	
			<span style="background-color:#cce1ff;" class="infoImgSpn glyphicon glyphicon-info-sign ">
			</span>
		</div>
		<div class="infoBox">
			<img src="http://www.ciperfect.com/images/carte.png"  style="background-color:#537bb4;" class="infoImg" />
		</div>
		<div class="infoBox">
			<span style="background-color:#96d99d;" class="infoImgSpn glyphicon glyphicon-search ">
			</span>
		</div>
	</div>
	</div>
	<div class="pull-left" id="sideLtHome">
		
	</div>
@endsection
