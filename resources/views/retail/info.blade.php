
<link type="text/css" href="{{ URL::to('css/info.css') }}" rel="stylesheet">
@extends("layouts.master")

@section("content")
<script src="{{ URL::to('js/info.js') }}" type="text/javascript"></script>
<?php  use App\RetailInfo as retail; ?>
		<div id="infoBoxDiv">
			<div id="headRet">
			<h2 class="pull-right">{{ $infos->adresse_retail }}</h2>
			<div class="pull-left">
			<button class="btn btn-primary"><span class="glyphicon glyphicon-share"></span> {{ trans("info.partager") }}</button>	
			<button class="btn btn-link"><span class="glyphicon glyphicon-print"></span> {{ trans("info.imprimer") }}</button>
			<button class="btn btn-link"><span class="glyphicon glyphicon-pushpin"></span> {{ trans("info.save") }}</button>
			</div>
			</div>
			<hr />
			<div id="SideLeft" style="background-color:white;padding:10px;" class="pull-left">
			<div id="imgList">
				@if($pics->count() > 0)
				<div id="mainImgDiv">
				<center>
				<span class="glyphicon glyphicon-menu-right"></span >
				<img id="mainImg" src="/thumbs/{{ $pics[0]->picture_name }}">
				<span class="glyphicon glyphicon-menu-left"></span >
				</center>
				</div>
					<div id="PicsListSel">
					@foreach($pics as $pic)
						<img class="flowImg pull-left" src="/thumbs/{{ $pic->picture_name}}">
					@endforeach
					</div>
				@else 
					<div class="panel panel-default"><div class="panel-body">There is no pictures</div></div>
				@endif
			</div>	
			<hr />	
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
			<hr />
						<div id="randRet">
					<h1>{{ trans("info.recyou") }}</h1>
					<?php $data = retail::limit(4)->orderBy(DB::raw('rand()'))->get(); ?>
						@foreach($data as $retail)
						<div class="randRetLst panel panel-default pull-right">
						<div class="panel-body">
				<center><img src="@if(count($retail->pics) > 0) /thumbs/{{ ($retail->pics)[0]->picture_name }} @else /icons/home.png @endif" class="imgRand"/></center>
						<hr />
						<h4><strong>{{ $retail->price }} {{ trans("new.currency") }}</strong></h4>
						<span>{{ trans("new.".$infos->type) }},{{trans("dashboard.".$infos->rent."_rt") }},{{ trans("cities.".$infos->city_id) }},{{ $retail->surface }} ...</span><br>
						<a href="/info/{{ $retail->id }}">More</a>
						</div>
						</div>
						@endforeach
						</div>		
			</div>
			<div id="SideRight"  class="pull-right">

				<div id="cntDetail">
					<div class="panel panel-default">
					<div class="panel-heading">{{ trans("info.cntInfo") }}</div>
					<div class="panel-body">
					<h2 align="center" style="color:#006cc9;"><strong>{{ $infos->price }} {{ trans("new.currency") }}</strong></h2><hr />	
					<button class="btn btn-lg btn-success fl" style="margin-bottom:10px;">{{ trans("new.call")}}</button>
					<button class="btn btn-lg btn-link fl" style="margin-bottom:10px;">{{ trans("info.sendM") }}</button><br>
					<center><a class="fl">{{ trans("info.reportRet") }}</a></center>
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
							<span class="glyphicon glyphicon-calendar"></span> {{ $infos->created_at }}<br>
							@if($count > 0)
								 {{ trans("info.cntRet") }} {{ $count }}<br>
								<a>{{ trans("info.otherRet") }}</a><br>
							@endif
							
						</div>	
					</div>
				</div>

			</div>
		</div>	
@endsection


