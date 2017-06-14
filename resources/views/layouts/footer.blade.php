<script type="text/javascript" src="/js/footer.js"></script>
<link href="/css/footer.css" type="text/css" rel="stylesheet" >
<div id="footer" dir="rtl">
		<div id="subs">
	<center>
			<h1>{{ trans("home.subButton") }} ,<small>{{ trans("home.subinfo") }}</small></h1>
			<form action="subsfrm" method="post">
			<input type="text" class="form-control" name="email" placeholder="{{ trans('login.user_holder') }}"><button class="btn btn-lg subbtn"><span class="glyphicon glyphicon-envelope"></span> {{ trans("home.subButton") }}</button><br>
			<br>
			<span id="notsub"><input type="checkbox" id="notify" name="notify">{{ trans("home.emailme") }}</span>
			<br><div class="alrt"></div>
			</form>
	</center>
		</div>
		<div id="links">
	<center>
		@if(Auth::check() == false)

		<a class="btn btn-md btn-link" href="login"><span class="glyphicon glyphicon-user"> </span> {{ trans("login.btn_login") }}</a>
		<a class="btn btn-md btn-link " href="register">{{ trans("register.register_btn") }}</a>
		@else 
		
			<ul style="">
				<li><a href="/list">{{ trans("header.myhouses") }}</a></li> <!-- myHouses -->
				<li><a href="#sv">{{ trans("header.saved") }}</a></li> <!-- SavedHouses -->
				<li><a href="settings">{{ trans("header.settings") }}</a></li> <!-- Settings -->
				<li><a href="#ctn">{{ trans("header.cont_us") }}</a></li> <!-- ContactUs -->
				<li><a href="#lan">Language</a></li> <!-- Language -->
				<li><a href="/logout">{{ trans("header.logout") }}</a></li> <!-- Logout -->
			</ul>
			
	</center>
		@endif
		</div>
		<div id="sec_links">
			<div class="list_links">
					<a href="/search/170/-1/-1" >{{ trans("cities.170") }}</a><br>	
					<a href="/search/175/-1/-1" >{{ trans("cities.175") }}</a><br>	
					<a href="/search/172/-1/-1" >{{ trans("cities.172") }}</a><br>	
					<a href="/search/171/-1/-1" >{{ trans("cities.171") }}</a><br>	
					<a href="/search/173/-1/-1" >{{ trans("cities.173") }}</a><br>	
			</div>
			<div class="list_links">
					<a href="/search/-1/ap/-1" >{{ trans("new.ap") }}</a><br>	
					<a href="/search/-1/vi/-1" >{{ trans("new.vi") }}</a><br>	
					<a href="/search/-1/ho/-1" >{{ trans("new.ho") }}</a><br>	
					<a href="/search/-1/la/-1" >{{ trans("new.la") }}</a><br>	
					<a href="/search/-1/st/-1" >{{ trans("new.st") }}</a><br>	
			</div>
			<div class="list_links">
					<a href="/search/-1/-1/-1" >{{ trans("new.allret") }}</a><br>	
					<a href="/search/-1/-1/-1" >{{ trans("new.allcit") }}</a><br>	
					<a href="/search/-1/-1/1" >{{ trans("new.rent")  }}</a><br>
					<a href="/search/-1/ap/2" >{{ trans("new.buy") }}</a><br>	
				
			</div>
			<div class="list_links">
					<a href="" >{{ trans("header.cont_us") }}</a><br>	
					<a href="" >{{ trans("new.newret") }}</a><br>		
			</div>
			<div class="list_links">
					<h5 style="margin-top:0px;">{{ trans("home.socialnet") }}</h5>
					<a href="http://www.facebook.com/partmat" class="pull-right" style="margin-left:10px;"><img src="{{ URL::to('icons/facebook.png') }}"></a>	
					<a href="http://www.twitter.com/partmat" class="pull-right" style="margin-left:10px;"><img src="{{ URL::to('icons/search.png') }}"></a>		
					<a href="http://www.twitter.com/partmat" class="pull-right" style="margin-left:10px;"><img src="{{ URL::to('icons/twitter.png') }}"></a>		
			</div>
			<div id="socnet">
					
					<span>{{ trans("home.reserved") }}, partmat.com</span>
					
			</div>
		</div>
</div>
