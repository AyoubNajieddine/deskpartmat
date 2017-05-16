@extends("layouts.master")

@section("content")
<link type="text/css" href="{{ URL::to('css/info.css') }}" rel="stylesheet">
<script src="{{ URL::to('js/info.js') }}" type="text/javascript"></script>
		<div id="infoBoxDiv">
			<div id="headRet">
			<h2 class="pull-right">{{ $infos->adresse_retail }}</h2>
			<div class="pull-left">
			<button class="btn btn-primary"><span class="glyphicon glyphicon-share"></span> Partager</button>	
			<button class="btn btn-link"><span class="glyphicon glyphicon-print"></span> Imprimer</button>
			<button class="btn btn-link"><span class="glyphicon glyphicon-pushpin"></span> Save</button>
			</div>
			</div>
			<hr />
			<div id="SideLeft" class="pull-left">
			<div id="imgList">
				<center>
				<!-- span class="glyphicon glyphicon-menu-right"></span -->
				<img id="mainImg" src="/thumbs/{{ $pics[0]->picture_name }}">
				<!-- span class="glyphicon glyphicon-menu-left"></span -->
				</center>
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
				
		<table class="table panel panel-default pull-right" id="mainInfo" dir="rtl">
			<tr><th>{{ trans("new.city") }}</th><td>{{ trans("cities.".$infos->city_id) }}</td></tr>
			<tr><td colspan="2" ><b>{{ trans("dashboard.retail")  }} {{trans("dashboard.".$infos->rent."_rt") }}</b></td></tr>
			<tr><th>{{ trans("new.price") }}</th><td>{{ $infos->price }}</td></tr>
			<tr><th>{{ trans("new.surface") }}</th><td>{{ $infos->surface }} m<sup>2</sup></td></tr>
			<tr><th>{{ trans("new.type") }}</th><td>{{ trans("new.".$infos->type) }}</td></tr>
			<tr><th>{{ trans("new.address") }}</th><td>{{ $infos->adresse_retail }}</td></tr>
		</table>
				<div class="pull-left panel panel-default" id="addInfo">
				<div class="panel-body">
					{{ $infos->info }}
				</div>
				</div>
				</div>
			</div>
			<div id="SideRight" class="pull-right">

				<div id="cntDetail">
					<div class="panel panel-default">
					<div class="panel-heading">Contact Info</div>
					<div class="panel-body">
					<h2 align="center" style="color:#006cc9;"><strong>{{ $infos->price }} DH</strong></h2>	
					<button class="btn btn-lg btn-success fl" style="margin-bottom:10px;">Call Number</button>
					<button class="btn btn-lg btn-link fl">Send Message</button>
					</div>
					</div>
				</div>
				<div id="userDetail">
					<div class="panel panel-default">
						<div class="panel-heading"><span class="glyphicon glyphicon-user"></span><a style="color:#333;" href="/viewusr/{{ $userInfo->id }}"><strong> {{ $userInfo->full_name}}</strong></a><span id="starts"><strong></strong></span></div>
								<?php  $count = $userInfo->retails->count(); ?>
						<!-- 
					Link to Profile of the user;
					Date Post
						 -->
						<div class="panel-body">
							@if($count > 0)
								Number Of retails are {{ $count }}<br>
								<a>user other retails</a><br>
							@endif
							date Of post {{ $infos->created_at}}
							
						</div>	
					</div>
				</div>

			</div>
		</div>	
@endsection


