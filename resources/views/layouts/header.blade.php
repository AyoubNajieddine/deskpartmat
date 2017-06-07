<link type="text/css" href="{{ URL::to('css/header.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::to('js/header.js') }}"></script>
<div id="header">
	<div id="logo" class="pull-left"><img src="http://q-ec.bstatic.com/static/img/b26logo/booking_logo_retina/22615963add19ac6b6d715a97c8d477e8b95b7ea.png">
	</div>	
		<!-- Panel side contains login and register -->
	<div id="sideButtons" class="pull-right" dir="rtl">
		@if(Auth::check() == false)
		<a class="btn btn-md btn-default" href="login"><span class="glyphicon glyphicon-user"> </span> {{ trans("login.btn_login") }}</a>
		<a class="btn btn-md btn-default " href="register">{{ trans("register.register_btn") }}</a>
		@else
		<a class="btn btn-md btn-default" id="menuBtn"><span class="glyphicon glyphicon-menu-hamburger"></span></a>
		<div id="menuDrop">
			<div id="idArrow"></div>
			<ul style="padding-right:1px;">
				<li><a href="/list">{{ trans("header.myhouses") }}</a></li> <!-- myHouses -->
				<li><a href="#sv">{{ trans("header.saved") }}</a></li> <!-- SavedHouses -->
				<li><a href="settings">{{ trans("header.settings") }}</a></li> <!-- Settings -->
				<li><a href="#ctn">{{ trans("header.cont_us") }}</a></li> <!-- ContactUs -->
				<li><a href="#lan">Language</a></li> <!-- Language -->
				<li><a href="/logout">{{ trans("header.logout") }}</a></li> <!-- Logout -->
			</ul>
		</div>
		@endif
		<a class="btn btn-md btn-success" href="/new">{{ trans("new.newret") }}</a>
		
	</div>


		<?php 
		/*
		*
		*
		*
		*
		* LOGIN FORM
		*
		*
		*
		*
		*/
		?>

	@if(!Auth::user())
	<div id="loginfrm" class="frm" dir="rtl">
		<a class="pull-left"><span class="glyphicon glyphicon-remove-sign"></span></a>
		<h3 class="pull-right">{{ trans("login.account") }}</h3>
		<br><hr />
		<div class="alert alert-danger hideElem">
		</div>	
		<form action="login" method="POST">
			<label for="email">{{ trans("login.user_holder") }}</label>
			<input type="text" class="form-control" name="email" placeholder=""><br>
			<label for="password">{{ trans("login.password_holder") }}</label>
			<input type="password" class="form-control" name="password" placeholder=""><br>
			<input type="checkbox" class="" name="remember"/>{{ trans("login.remember") }}<br><br>
			<button class="btn btn-lg fl btn-primary">{{ trans("login.btn_login") }}</button><br><br>
			<center><a href="" type="btn btn-md btn-link">{{ trans("login.forgot") }}</a></center>
		</form>
			<hr />
			<table class="fl">
			<tr><td>
			<button class="btn btn-default" id="fbcon"><img src="{{ URL::to('icons/facebook.png') }}"> {{ trans("login.facebook_login") }}</button>
			</td><td>
			<button class="btn btn-default" id="gmcon"><img src="{{ URL::to('icons/search.png') }}"> {{ trans("login.google_login") }}</button>
			</td></tr>
			</table>			
	</div>

		<?php 
		/*
		*
		*
		*
		*
		* REGISTER FORM
		*
		*
		*
		*
		*/
		?>

	<div id="registerfrm" class="frm" dir="rtl">	
		<a class="pull-left"><span class="glyphicon glyphicon-remove-sign"></span></a>
		<h3 class="pull-right">{{ trans("register.newaccount") }}</h3>
		<br><hr />
		<div class="alert alert-danger hideElem">
		</div>	
		<form action="register" method="POST">
			<label>{{ trans("register.name_lb") }}</label>
			<input type="text" class="form-control" id="regname" name="full_name" ><br>
			<label>{{ trans("register.email_lb") }} </label>
			<input type="email" class="form-control" name="email" id="regemail" ><br>
			<label>{{ trans("register.password_lb") }}</label>
			<input type="password" class="form-control" name="password" id="regpassword" ><br>					
			<button class="btn btn-lg btn-primary fl">{{ trans("login.btn_register") }}</button>

		</form><hr />
			<table class="fl">
			<tr><td>
			<button class="btn btn-default" id="fbcon"><img src="{{ URL::to('icons/facebook.png') }}"> {{ trans("login.facebook_login") }}</button>
			</td><td>
			<button class="btn btn-default" id="gmcon"><img src="{{ URL::to('icons/search.png') }}"> {{ trans("login.google_login") }}</button>
			</td></tr>
			</table>			
	</div>
		<?php 
		/*
		*
		*
		*
		*
		* SETTINGS FORM
		*
		*
		*
		*
		*/
		?>
	@else
	<div id="settings" class="frm" dir='rtl'>
		
		<a class="pull-left"><span class="glyphicon glyphicon-remove-sign"></span></a>
		<h3 class="pull-right">{{ trans("header.settings") }}</h3>
		<br><hr />
		<div class="alert alert-danger hideElem">
		</div>	
	 		<div class="panel panel-default mnuElem" id="mnuSet">
				<table class="table">
					<tr>
						<td><strong>{{trans("upduser.email_lb")}}</strong><br><small>{{ (Auth::user())->email }}</small></td>
						<td align="left" style="padding-top: 18px !important;"><span class="glyphicon glyphicon-menu-left"></span></td>
					</tr>
					<tr>
						<td><strong>{{trans("upduser.password_lb")}}</strong></td>
						<td align="left"><span class="glyphicon glyphicon-menu-left"></span></td>
					</tr>
					<tr>
						<td><strong>{{trans("upduser.name_lb")}}</strong><br><small>{{ (Auth::user())->full_name }}</small></td>
						<td align="left" style="padding-top: 18px !important;"><span class="glyphicon glyphicon-menu-left" margin></span></td>
					</tr>
					<tr>
						<td><strong>{{trans("upduser.delete_lb")}}</strong></td>
						<td align="left"><span class="glyphicon glyphicon-menu-left"></span></td>
					</tr>
				</table>
	 		</div>
			<div id="updemail" class="hideElem mnuElem">
			
		<div class="panel panel-default">
		<div class="panel-heading" style="background-color:white !important;">{{trans("updeml.box_hd")}}</div>
		<div class="panel-body">
		<form action="eml" method="POST">
				<label for="email">{{trans("updeml.email_lb")}}</label>
				<input class="form-control" name="email" type="text"/><br>
				<label for="cr_email">{{trans("updeml.cm_email_lb")}}</label>
				<input class="form-control" name="cr_email" type="text"/><br>
				<button class="btn btn-md btn-primary fl inp">{{trans("updeml.save")}}</button>
		</form><br>
		<a href="upd" class="btn btn-md btn-default fl">{{trans("updeml.cancel")}}</a></div>
		</div>
			</div>
			<div id="updpassword" class="hideElem mnuElem">
		<form action="pwd" method="POST">
				<input class="form-control" name="cr_password" placeholder="{{trans('updpwd.old_password')}}" type="password"/><hr />
				<input class="form-control" name="password" placeholder="{{trans('updpwd.password')}}" type="password"/><br>
				<input class="form-control" name="cm_password" placeholder="{{trans('updpwd.com_password')}}" type="password"/><br>
				<button class="btn btn-md btn-primary fl inp">{{trans("updpwd.save")}}</button>
		</form><br>
		<a href="upd" class="btn btn-md btn-default fl">{{trans("updpwd.cancel")}}</a>
			</div>
			<div id="updname" class="hideElem mnuElem">
		<div class="panel panel-default">
		<div class="panel-heading" style="background-color:white !important;">{{trans("updnm.box_hd")}}</div>
		<div class="panel-body">

		<form action="nm" method="POST">
			<label for="fname">{{trans("updnm.fname_lb")}}</label>
			<input class="form-control" type="text" name="fname" placeholder=""/><br>
			<label for="lname">{{trans("updnm.lname_lb")}}</label>
			<input class="form-control" type="text" name="lname" placeholder=""/><br>
			<button class="btn btn-md btn-primary inp fl">{{trans("updnm.save")}}</button>
		</form><br>
		<a href="upd" class="btn btn-md btn-default fl">{{trans("updnm.cancel")}}</a>
		</div>
		</div>
			</div>
			<div id="delaccount">
		<center>
		<div id="delcnt" class="hideElem mnuElem">
			<form action="/deluser" method="POST" >
				 <div class="panel panel-default">
				 <div class="panel-body" >
					<strong>{{trans("delcnt.strong_txt")}}</strong>
						<br><small>{{trans("delcnt.small_txt")}}</small>
				 </div>
			<div class="panel-footer" style="background-color:white !important;">
				 <button class="btn btn-md btn-primary inp">{{trans("delcnt.delete")}}</button><a href="upd" style="margin-right: 5px;" class="btn btn-md btn-default">{{trans("delcnt.cancel")}}</a></div>
				</div>
			</form>
		</div>
		</center>
			</div>
	

	</div>
	@endif
	<div id="null"><!-- TO MAKE THE BOX BACKGROUND FADED --></div>
</div>
