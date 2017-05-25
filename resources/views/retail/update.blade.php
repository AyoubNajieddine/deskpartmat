@extends("layouts.master")
@section("content")
<script type="text/javascript" src="{{ URL::to('/js/master.js') }}"></script>
<script src="/js/update.js"></script>
	<center>
	<div id="updpartma" style="width:500px;margin-bottom:50px;background-color:white;">
		  <div id="updpartma_menu">
			<table class="table table-bordered">
				<tr>
					<td style="position:relative;">	
				<a  data="#rent" class="edit_opt"></a>
						<h4>{{ trans("dashboard.retail") }} {{ trans("dashboard.".$retail->rent."_rt") }}</h4>
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative;">
				<a  data="#type" class="edit_opt"></a>
			<h4>{{ trans("new.type") }}<br><small>{{ trans("new.".$retail->type) }}</small></h4>	

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative;">
				<a  data="#address" class="edit_opt"></a>
			<h4>{{ trans("new.address") }}<br><small>{{ $retail->adresse_retail }}</small></h4>

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative;">
				<a  data="#price" class="edit_opt"></a>
			<h4>{{ trans("new.price") }}<br><small>{{ $retail->price }} {{ trans("new.currency")}}</small></h4>

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative;">
				<a  data="#surface" class="edit_opt"></a>
			<h4>{{ trans("new.surface") }}<br><small>{{ $retail->surface }} m²</small></h4>
			
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative;">
				<a  data="#phone" class="edit_opt"></a>
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
			<h4>{{ trans("new.phone") }}<br><small>{{ $retail->phone }}</small></h4>
				
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative;">	
				<a  data="#city" class="edit_opt"></a>
						<h4>{{ trans("new.city")}}<br><small>{{ $retail->city->name_ar}}</small></h4>	
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
			@if($retail->type != "st" && $retail->type != "la")
				<tr>
					<td style="position:relative;">	
				<a  data="#carac" class="edit_opt"></a>
						<h4>{{ trans("new.carac") }}<br><br><small>
							<ul>
							@if($retail->balc) <li>{{ trans("new.balc") }}</li> @endif
							@if($retail->gar) <li>{{ trans("new.gara") }}</li> @endif
							@if($retail->furn) <li>{{ trans("new.furn") }}</li> @endif
							</ul>	
					</small></h4>	
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
			
				<tr>
					<td style="position:relative;">
				<a  data="#nbrooms" class="edit_opt"></a>
			<h4>{{ trans("new.piece") }}<br><small>{{ $retail->nbRooms }}</small></h4>
				
					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
				 @endif
				<tr>
					<td style="position:relative">	
				<a  data="#pictures" class="edit_opt"></a>
						<h4>{{ trans("dashboard.editpic")}}</h4>

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative">	
				<a  data="#zipcode" class="edit_opt"></a>
						<h4>{{ trans("new.zipcode")}}<br><small>{{ $retail->zipcode }}</small></h4>

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
						<tr>
					<td style="position:relative">	
				<a  data="#addinfo" class="edit_opt"></a>
						<h4>{{ trans("new.info")}}<br><small>{{ $retail->info }}</small></h4>

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
				<tr>
					<td style="position:relative">	
						<h4>{{ trans("new.location")}}</h4>

					<a href="#" class="glyphicon glyphicon-chevron-left chev_link"></a>
					</td>
				</tr>
			
			</table>
		</div>
			<!-- Update Partma -->
		<div id="updpartma_data">
				<!-- Error Box-->
			<div class="alert alert-danger" style="display:none;">
				<ul></ul>
			</div>
					<!-- Address -->
			 <div id="address" style="display:none;">
				<form action="update/address/{{ $id }}" method="POST">
				   <div class="panel panel-default">
						<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.address") }}</b></div>
						<div class="panel-body">
					<input type="text" name="adresse_retail" class="form-control" placeholder="{{ trans('new.address') }}" /><br>
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#address">{{ trans("updpwd.cancel") }}</a>
					</center>
						</div>
					</div>

				</form>
			</div>
					<!-- rent -->
			 <div id="rent" style="display:none;">
				<form action="update/rent/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-body">
						<!-- rent data -->
				    <div class="form-group">
					<select name="rent" class="form-control">
						<option value="-1">{{ trans('new.rentbuy') }}</option>
						<option value="1">{{ trans('new.rent') }}</option>
						<option value="2">{{ trans('new.buy') }}</option>
					</select><br>
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#rent">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				  </div>
				</form>
			</div>
					<!-- type -->
			 <div id="type" style="display:none;">
				<form action="update/type/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.type") }}</b></div>
					<div class="panel-body">
						<!-- type data -->
				    <div class="form-group">
					<select name="type" class="form-control">
						<option>{{ trans('new.type') }}</option>
						<option value="ap" >{{ trans('new.ap')}}</option>
						<option value="vi">{{ trans('new.vi')}}</option>
						<option value="ho" >{{ trans('new.ho')}}</option>
						<option value="fl" >{{ trans('new.fl')}}</option>
						<option value="st" >{{ trans('new.st')}}</option>
						<option value="la" >{{ trans('new.la')}}</option>
					</select>
				    </div>
					<br>
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#type">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				</form>
			</div>
					<!-- price -->
			 <div id="price" style="display:none;">
				<form action="update/price/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.price") }}</b></div>
					<div class="panel-body">
						<!-- price data -->
				    <div class="form-group">
					<label for="ret_price"></label>
					<div class="input-group" dir="ltr">
						<span class="input-group-addon"><i>{{ trans('new.currency') }}</i></span>
						<input type="text" class="form-control" name="price" dir="rtl" placeholder="{{ trans('new.price') }}"/>
					</div>
				    </div>
					<br>
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#price">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				</form>
			</div>
					<!-- surface -->
			 <div id="surface" style="display:none;">
				<form action="update/surface/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.surface") }}</b></div>
					<div class="panel-body">
						<!-- surface data -->
				    <div class="form-group">
					<div class="input-group" dir="ltr">
						<span class="input-group-addon">	
						<i>m<sup>2</sup></i>
						</span>
						<input type="text" class="form-control" name="surface" placeholder="{{ trans('new.surface') }}" dir="rtl"/>
					</div>	
				    </div>
					<br>
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#surface">{{ trans("updpwd.cancel") }}</a>
					</center>

					</div>
				  </div>
				</form>
			</div>
					<!-- phone -->
			 <div id="phone" style="display:none;">
				<form action="update/phone/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.phone") }}</b></div>
					<div class="panel-body">
						<!-- phone data -->
				  <div class="form-group">
					<div class="input-group" dir="ltr">
						<span class="input-group-addon bg-primary"><i class="glyphicon glyphicon-earphone"></i></span>
						<input type="text" class="form-control" name="phone" dir="rtl" placeholder="{{ trans('new.phone') }}"/>
					</div>
				  </div>
					<br>
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#phone">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				</form>
			</div>
					<!-- City -->
			 <div id="city" style="display:none;">
				<form action="update/city/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.city") }}</b></div>
					<div class="panel-body">
						<!-- city data -->		
				    <div class="form-group">
					<select name="city_id" class="form-control">
						<option>{{ trans('new.city') }}</option>
						@foreach($cities as $city)
						<option value="{{ $city->id }}">{{ $city->name_ar }}</option>
						@endforeach
					</select>
				    </div>
					<br>	
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#city">{{ trans("updpwd.cancel") }}</a>
					</center>
				
					</div>
				  </div>
				</form>
			</div>
					<!-- carac -->
			 <div id="carac" style="display:none;">
				<form action="update/carac/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.carac") }}</b></div>
					<div class="panel-body">
						<!-- caratersitic data -->
						
					<label><input type="checkbox" name="balc" value="1" @if($retail->balc) checked @endif >  {{ trans('new.balc') }}</label><br>
					<label><input type="checkbox" name="gar" value="1" @if($retail->gar) checked @endif > {{ trans('new.gara') }}</label><br>
					<label><input type="checkbox" name="furn" value="1" @if($retail->furn) checked @endif > {{ trans('new.furn') }}</label><br>
					<center>
					<button class="btn btn-primary btn-md inp">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#carac">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				
				  </div>
				</form>
			</div>
					<!-- pictures -->
			 <div id="pictures" style="display:none;">
				<form action="update/pictures/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.pictures") }}</b></div>
					<div class="panel-body">
						<!-- pictures data -->
						<?php $counter = 0; ?>
							@foreach($pics as $pic)
						<div class="thumb_div {{ $counter }}" ><span class="glyphicon glyphicon-remove-sign thumb_cls text-danger" target-data=".thumb_div {{ $counter }}"></span><img class="img-thumbnail upl_list" width="99px" height="100px" src="/thumbs/{{ $pic->picture_name }}"/></div>	
						<?php $counter = $counter+1; ?>
							@endforeach	
					<div class="fileUpld btn btn-success btn-lg">
						<span class="glyphicon glyphicon-camera" dir="ltr"></span>
						<input type="file" name="img[]" class="upload" id="upld" cs="{{ csrf_token() }}" required/>
					</div>
					</div>
					<div class="panel-footer" style="background-color:white;">
					<center>
					<button class="btn btn-primary btn-md inp">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#pictures">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>		
				  </div>
				</form>
			</div>
					<! -- nbrooms -->
			 <div id="nbrooms" style="display:none;">
				<form action="update/nbrooms/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.piece") }}</b></div>
					<div class="panel-body">
						<!-- nbrooms data -->	
				    <div class="form-group" dir="ltr">
					
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-bed"></i></span>
					<select name="nbRooms" class="form-control" style="text-align:right;">
							<option value="-1">{{ trans('new.piece') }}</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10+</option>
					</select>
					</div>	
				    </div>	
				<br>	
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#nbrooms">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				</form>
			</div>


				<!-- zipcode -->

			 <div id="zipcode" style="display:none;">
				<form action="update/zipcode/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.zipcode") }}</b></div>
					<div class="panel-body">		
				    		<div class="form-group">
						<input type="text" class="form-control" name="zipcode" placeholder="{{trans('new.zipcode') }}" />
						</div>	
					<br>	
					<center>
					<button class="btn btn-primary btn-md inp ">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#zipcode">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				</form>
			</div>
	
				<!-- retail add info -->	
			 <div id="addinfo" style="display:none;">
				<form action="update/info/{{ $id }}" method="POST">
				   <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;"><b>{{ trans("dashboard.edit") }} {{ trans("new.info") }}</b></div>
					<div class="panel-body">
						<!-- retail add data -->
					<textarea class="form-control" rows="8" style="resize:none;" name="info" placeholder="{{ trans('new.info') }}"></textarea><br>	
					<center>
					<button class="btn btn-primary btn-md inp">{{ trans("updpwd.save") }}</button>
					<a class="btn btn-default btn-md cancel" data="#addinfo">{{ trans("updpwd.cancel") }}</a>
					</center>
					</div>
				  </div>
				</form>
			</div>
		
		</div>
	</div>	
	</center>
@endsection
