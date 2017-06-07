@extends("layouts.master")

@section("content")
<script src="{{ URL::to('js/new.js') }}"></script>
<link type="text/css" href="/css/new.css" rel="stylesheet" />	
			<center>
<div id="newpart"  style="width:500px;margin-bottom:50px;">
				<form action="/addRetail" method="POST">
		<div  class="panel panel-default">
			<div class="panel-heading" style="background-color:white;">{{ trans('new.newpartma') }}</div>
			<div class="panel-body">
				    <div class="form-group">
					<select name="ret_city" class="form-control">
						<option>{{ trans('new.city') }}</option>
						@foreach($cities as $city)
						<option value="{{ $city->id }}">{{ trans("cities.".$city->id) }}</option>
						@endforeach
					</select>
				    </div>
				    <div class="form-group">
					<div class="input-group" dir="ltr">
						<span class="input-group-addon bg-primary" ><i class="glyphicon glyphicon-map-marker" style="position:relative;"><a class="edit_opt" href="#data"></a></i></span>
						<input type="text" class="form-control" name="ret_address" placeholder="{{ trans('new.address') }}" dir="rtl"/>
					</div>
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
				    <div class="form-group">
					<label for="ret_price"></label>
					<div class="input-group" dir="ltr">
						<span class="input-group-addon"><i>{{ trans('new.currency') }}</i></span>
						<input type="text" class="form-control" name="ret_price" dir="rtl" placeholder="{{ trans('new.price') }}"/>
					</div>
				    </div>
				    <div class="form-group">
					<div class="input-group" dir="ltr">
						<span class="input-group-addon">	
						<i>m<sup>2</sup></i>
						</span>
						<input type="text" class="form-control" name="ret_surface" placeholder="{{ trans('new.surface') }}" dir="rtl"/>
					</div>	
				    </div>

				    	<div id="dynFrm">
				  		<!-- this will be changed using javascript -->
					</div>
				    <textarea name="ret_info" class="form-control" rows="8" style="resize:none;" placeholder="{{ trans('new.info') }}"></textarea><br>
			</div>
		</div>
			<div class="panel panel-default">
				<div class="panel-body" id="img_div">
					<div class="fileUpld btn btn-success btn-lg">
						<span class="glyphicon glyphicon-camera" dir="ltr"></span>
						<input type="file" name="img[]" class="upload" id="upld" cs="{{ csrf_token() }}" required />
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">{{trans("new.infopst") }}</div>
				<div class="panel-body">
				
						
				    <div class="form-group">
					<div class="input-group" dir="ltr">
						<span class="input-group-addon bg-primary"><i class="glyphicon glyphicon-earphone"></i></span>
						<input type="text" class="form-control" name="ret_post_phone" dir="rtl" placeholder="{{ trans('new.phone') }}"/>
					</div>
				    </div>
				    <div class="form-group">
						<input type="text" class="form-control" name="ret_post_zip" placeholder="{{trans('new.zipcode') }}" />
					</div>
				    </div>
				
				</div>
			<button class="btn btn-primary btn-lg inp fl" >{{ trans('new.save') }}</button>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				</form>	
			</div>
			<center>
@endsection
