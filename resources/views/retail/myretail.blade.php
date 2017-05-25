<link type="text/css" href="{{ URL::to('css/myretail.css') }}" rel="stylesheet">
<link type="text/css" href="{{ URL::to('css/search.css') }}" rel="stylesheet">
@extends("layouts.master")

@section("content")
<script src="{{ URL::to('js/myretail.js') }}" type="text/javascript"></script>
	<div id="myretail">
			<div id="sideRtRet" class="pull-right">
				<div class="panel panel-default" id="msgBox" >
					<div class="panel-heading">
						<span class="glyphicon glyphicon-envelope"></span>
						<a href="#" >NUMBER OF LETTER 5</a>
					</div>
				</div>
				<div class="panel panel-default" id="msgBox" >
					<div class="panel-heading">
						<span class="glyphicon glyphicon-pushpin"></span>
						<a href="#" >{{ trans("header.saved") }}</a>
					</div>
				</div>
				<div class="panel panel-default" id="msgBox" >
					<div class="panel-body">
						<span class="glyphicon glyphicon-user"></span>
						<a href="#" >{{ trans("header.settings") }}</a>
					</div>
				</div>
			</div>
			<div id="sideLtRet" class="pull-left">
					
	   @if($data->total() >  0 && $data->currentPage() <= $data->total())
	<div id="searchData">
		@foreach($data as $retail)
		<div class="panel panel-default ret_dash">
			<div class="panel-body">
	<img src="@if(count($retail->pics) > 0) /thumbs/{{ ($retail->pics)[0]->picture_name }} @else /icons/home.png @endif" class="imgSd pull-right"/>
		<div class="partmat_data">
			<span class="text-success">{{ trans("new.".$retail->type) }}</span>,
			<span style="font-size:14px;">{{ trans("cities.".$retail->city_id) }}</span>,
			<span>{{ $retail->price }} {{ trans("new.currency")}}</span>,	
			<span>{{ trans("dashboard.".$retail->rent."_rt") }},....</span>
			| 
			<span><small>{{ trans("dashboard.date") }} {{ $retail->created_at }}</small></span>
			<br>
			<table class="partmat_btn">
			<tr><td>
			<a class="fl" href="/updret/{{ $retail->id}}" >{{ trans("dashboard.edit") }}</a>
			</td><td> | </td><td> 
			<a class="fl" href="delret" data-id="{{ $retail->id }}" >{{ trans("dashboard.delete") }}</a>
			</td></tr>
			</table>
				</div>
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
	<div id="delretfrm" class="frm" dir="rtl">	
		<a class="pull-left"><span class="glyphicon glyphicon-remove-sign"></span></a>
		<h3 class="pull-right">{{ trans("home.delretTitle") }}</h3>
		<br><hr />
		<div class="alert alert-danger hideElem">
		</div>
		<div class="panel panel-default">
				<div class="panel-heading" style="background-color:white;">
					{{trans("home.delretQuest") }}
				</div>
				<div class="panel-body">
					<center>
		 <a href="" class="btn btn-md btn-primary inp">{{trans("home.delret")}}</a><a href="canret" style="margin-right: 5px;" class="btn btn-md btn-default">{{trans("delcnt.cancel")}}</a></div>
					</center>
				</div>
		</div>	
	</div>
	</div>
@endsection
