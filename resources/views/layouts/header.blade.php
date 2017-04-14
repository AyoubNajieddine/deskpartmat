<link type="text/css" href="{{ URL::to('css/header.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{ URL::to('js/header.js') }}"></script>
<div id="header">
	<div id="logo" class="pull-left"><img src="http://q-ec.bstatic.com/static/img/b26logo/booking_logo_retina/22615963add19ac6b6d715a97c8d477e8b95b7ea.png">
	</div>	
		<!-- Panel side contains login and register -->
	<div id="sideButtons" class="pull-right">
		<a class="btn btn-md btn-success" href="/new">Post here</a>
		<a class="btn btn-md btn-default " href="register">Register</a>
		<a class="btn btn-md btn-default" href="login"><span class="glyphicon glyphicon-user"></span> Login</a>
		
	</div>
	<div id="loginfrm" class="frm">
		<a class="pull-left"><span class="glyphicon glyphicon-remove-sign"></span></a>
		<h3 class="pull-right">Login</h3>
		<br><hr />
		<form action="/login" method="POST">	
			<input type="text" class="form-control" name="email" placeholder="email"><br>
			<input type="password" class="form-control" name="password" placeholder="password"><br>					
			<a href="" type="btn btn-md btn-link">Forgot password ? </a><br><br>
			<button class="btn btn-lg fl btn-primary">Login</button>
		</form>
	</div>
	<div id="registerfrm" class="frm">	
		<a class="pull-left"><span class="glyphicon glyphicon-remove-sign"></span></a>
		<h3 class="pull-right">Register</h3>
		<br><hr />
		<form action="/login" method="POST">
			<input type="text" class="form-control" name="full_name" placeholder="full name"><br>
			<input type="email" class="form-control" name="email" placeholder="email"><br>
			<input type="password" class="form-control" name="password" placeholder="password"><br>					
			<button class="btn btn-md btn-primary fl">register</button>

		</form>
	</div>
	<div id="null"></div>
	
</div>
