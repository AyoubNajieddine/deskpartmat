@extends("layouts.master")

@section("content")
<link type="text/css" href="{{ URL::to('css/search.css') }}" rel="stylesheet">
<script src="{{ URL::to('js/search.js') }}" type="text/javascript"></script>
		<div id="infoBoxDiv">
			<div id="SideLeft">
			<div id="imgList">
				<img id="mainImg" src="/thumbs/{{ $pics[0]->picture_name }}">
				@if($pics->count() > 0)
					<div id="PicsListSel">
					@foreach($pics as $pic)
						<img class="flowImg" src="/thumbs/{{ $pic->picture_name}}">
					@endforeach
					</div>
				@else 

				@endif
			</div>		
				<div id="partmaDetail">
		<table class="table panel panel-default">
		
			<tr><th>{{ trans("new.city") }}</th><td>{{ trans("cities.".$infos->city_id) }}</td></tr>
			<tr><td colspan="2" ><b>{{ trans("dashboard.retail")  }} {{trans("dashboard.".$infos->rent."_rt") }}</b></td></tr>
			<tr><th>{{ trans("new.price") }}</th><td>{{ $infos->price }}</td></tr>
			<tr><th>{{ trans("new.surface") }}</th><td>{{ $infos->surface }} m<sup>2</sup></td></tr>
			<tr><th>{{ trans("new.type") }}</th><td>{{ trans("new.".$infos->type) }}</td></tr>
			<tr><th>{{ trans("new.address") }}</th><td>{{ $infos->adresse_retail }}</td></tr>
		</table>
				</div>

			</div>
			<div id="SideRight">
				<div id="cntDetail">
					<div class="panel panel-default">
					<div class="panel-heading">Contact Info</div>
					<div class="panel-body">	
					<button class="btn btn-md btn-success fl ">Call Number</button>
					<button class="btn btn-md btn-link fl">Send Message</button>
					</div>
					</div>
				</div>
				<div id="userDetail">
					<div class="panel panel-default">
						<div class="panel-heading"><strong><span class="glyphicon glyphicon-user"></span><a style="color:#333;" href="/viewusr/{{ $userInfo->id }}"><strong> {{ $userInfo->full_name}}</strong></a><span id="starts"><strong></strong></span></div>
								<?php  $count = $userInfo->retails->count(); ?>
						<!-- 
					Link to Profile of the user;
					Date Post
						 -->
						<div class="panel-body">
							@if($count > 0)
								Number Of retails are {{ $count }}<br>
								<a>see other retails for the user</a>
							@endif
							date Of post {{ $infos->created_at}}
							
						</div>	
					</div>
				</div>

			</div>
		</div>	
@endsection
