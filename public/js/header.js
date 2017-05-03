$("#header").ready(function(){
	loadLogin();
	loadRegister();
	loadSettings();
	hideElem();
	login();
	register();
	showMenu();
	settingsToggle();
	updName();
	updPassword();
	updEmail();
});
function loadLogin(){
	$('a[href=login]').click(function(event){
		event.preventDefault();
		$("#null").addClass("null");
		$("#settings").hide();	
		$("#loginfrm").show();
		$("#registerfrm").hide();	
				
	});
}
function loadRegister(){
	$('a[href=register]').click(function(event){
		event.preventDefault();
		$("#null").addClass("null");
		$("#settings").hide();	
		$("#loginfrm").hide();
		$("#registerfrm").show();	
	});
}
function  loadSettings(){
	$("a[href=settings]").click(function(){
		event.preventDefault();
		$("#null").addClass("null");
		$("#settings").show();	
		$("#loginfrm").hide();
		$("#registerfrm").hide();	

	});	
}
function hideElem(){
	$("a.pull-left").click(function(){
		$("#null").removeClass("null");
		$(".frm").hide();
	});
}
function login(){
	$("form[action=login]").submit(function(event){
		event.preventDefault();				
		alertBox = $("#loginfrm .alert");
		email = $("input[name=email]").val();
		password = $("input[name=password]").val();
		token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
		$.post("/login",{_token:token, password:password, email:email} ,function(ret){
			//type = ret.tp;
			//console.log(ret.tp);	
			ret = JSON.parse(ret);
			type = ret.tp;	
			if(type == 0){
				// server problem
				alertBox.text("");	
				alertBox.text(ret.res);
				alertBox.show();	
			}
			if(type == 1){
				// login success	
				document.location = "/";
			}
			if(type == 2) {
				alertBox.text("");	
				dataArr = $.map(ret.res, function(value, index){ return value; });
				for(i = 0 ; i < dataArr.length ; i++){
					alertBox.append("<li>"+dataArr[i]+"</li>");
				}
				alertBox.show();	
			}

		});
	});
}
function register(){
	$("form[action=register]").submit(function(event){
		alertBox = $("#registerfrm .alert");
		event.preventDefault();
		full_name = $("#regname").val();
		email = $("#regemail").val();
		password = $("#regpassword").val();
		token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
		console.log(email+":"+full_name+":"+password+":"+token);
		$.post("/register", {_token:token,email:email, password:password, full_name:full_name}, function(ret){
			ret = JSON.parse(ret);
			type = ret.tp;	
			if(type == 0){
				// server problem
				alertBox.text("");	
				alertBox.text(ret.res);
				alertBox.show();	
			}
			if(type == 1){
				// login success	
				document.location = "/";
			}
			if(type == 2) {
				alertBox.text("");	
				dataArr = $.map(ret.res, function(value, index){ return value; });
				for(i = 0 ; i < dataArr.length ; i++){
					alertBox.append("<li>"+dataArr[i]+"</li>");
				}
				alertBox.show();	
			}
		});		
	});
}
function showMenu(){
	$("#menuBtn").click(function(){
		console.log("Test Test");
		$("#menuDrop").toggleClass("shmnu");	
		bl  = $("#menuDrop").hasClass("shmnu");
		if(bl == true) { 
		$("#menuBtn span").removeClass("glyphicon-menu-hamburger"); 
		$("#menuBtn span").addClass("glyphicon-remove");
		$("#idArrow").show();
		$("#menuDrop ul").show();
		}
		else {
		$("#menuBtn span").removeClass("glyphicon-remove"); 
		$("#menuBtn span").addClass("glyphicon-menu-hamburger");
		$("#idArrow").hide(); 
		$("#menuDrop ul").hide();
		}
	});
}
function hideSettingsBox(){
	elements.each(function(){
			bool = $(this).hasClass("hideElem");
			if(bool == false){
				$(this).addClass("hideElem");
			}
		});
}
function emptySetInputs(){
		$("#settings input[type=text],#settings input[type=password]").each(function(){
			$(this).val("");
		});
}
function settingsToggle(){
	elements = $(".mnuElem");
	data = document.getElementById("mnuSet").getElementsByTagName("tr");
	$(data[3]).click(function(){
		// delete view
		hideSettingsBox();
		$("#delcnt").removeClass("hideElem");
	});
	$(data[0]).click(function(){
		// get the data from ajax // EMAIL CHANGE
		hideSettingsBox();
		$("#updemail").removeClass("hideElem");
	});
	$(data[1]).click(function(){
		// PASSWORD CHANGE
		hideSettingsBox();
		$("#updpassword").removeClass("hideElem");
	});
	$(data[2]).click(function(){
		// FULL NAME CHANGE
		hideSettingsBox();
		$("#updname").removeClass("hideElem");

	});
	$('a[href=upd]').click(function(event){
		event.preventDefault();
		hideSettingsBox();
		$("#mnuSet").removeClass("hideElem");
		emptySetInputs();
		if($("#settings .alert").hasClass() == false) $("#settings .alert").addClass("hideElem");
	});
	$("#settings .glyphicon-remove-sign").click(function(){
		event.preventDefault();
		hideSettingsBox();
		$("#mnuSet").removeClass("hideElem");
		if($("#settings .alert").hasClass("hideElem") == false) $("#settings .alert").addClass("hideElem");
	});
     
}

/********************************************
	SETTINGS CONFIGURATION
*********************************************/

function updEmail() {
		SetalertBox = $("#settings .alert");
		$('form[action=eml]').submit(function(event){
			event.preventDefault();
			email = $("#settings input[name=email]").val();
			cr_email = $("#settings input[name=cr_email]").val();
			token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
			$.post("/eml", {_token:token,email:email,cr_email:cr_email},function(ret){
				if(ret == 1){
					// saved successufly
				hideSettingsBox();
				$("#mnuSet").removeClass("hideElem");
				$("#mnuSet small").get(0).innerHTML = email;
				emptySetInputs();
				if($("#settings .alert").hasClass("hideElem") == false) $("#settings .alert").addClass("hideElem");
				}
				else if(ret == 0){
					// errors in saving
				console.log(ret);
				}
				else {
					// errors in validator

				SetalertBox.text("");	
				dataArr = $.map(ret, function(value, index){ return value; });
				for(i = 0 ; i < dataArr.length ; i++){
					
					SetalertBox.append("<li>"+dataArr[i]+"</li>");
				}
				if($("#settings .alert").hasClass("hideElem") == true) $("#settings .alert").removeClass("hideElem");
				}
			});	
			
		});
}
function updPassword(){
		SetalertBox = $("#settings .alert");
		$('form[action=pwd]').submit(function(event){
			event.preventDefault();
			cr_password = $("input[name=cr_password]").val();
			password = $("input[name=password]").val();
			cm_password = $("input[name=cm_password]").val();
			token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
			$.post("/pwd", {_token:token,password:password,cr_password:cr_password,cm_password:cm_password},function(ret){
				if(ret == 1){
					// saved successufly
				hideSettingsBox();
				$("#mnuSet").removeClass("hideElem");
				emptySetInputs();
				if($("#settings .alert").hasClass("hideElem") == false) $("#settings .alert").addClass("hideElem");
				}
				else if(ret == 0){
					// errors in saving
				console.log(ret);
				}
				else {
					// errors in validator
				SetalertBox.text("");	
				dataArr = $.map(ret, function(value, index){ return value; });
				for(i = 0 ; i < dataArr.length ; i++){
					SetalertBox.append("<li>"+dataArr[i]+"</li>");
				}
				if($("#settings .alert").hasClass("hideElem") == true) $("#settings .alert").removeClass("hideElem");
				}
			});	
		});
}
function  updName(){
		SetalertBox = $("#settings .alert");
		$('form[action=nm]').submit(function(event){
			event.preventDefault();
			fname = $("input[name=fname]").val();
			lname = $("input[name=lname]").val();
			token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
			$.post("/nm", {_token:token,lname:lname,fname:fname},function(ret){
				if(ret == 1){
					// saved successufly
				hideSettingsBox();
				$("#mnuSet").removeClass("hideElem");
				$("#mnuSet small").get(1).innerHTML = fname + " " + lname;
				emptySetInputs();
				
				if($("#settings .alert").hasClass("hideElem") == false) $("#settings .alert").addClass("hideElem");
				}
				else if(ret == 0){
					// errors in saving
				console.log(ret);
				}
				else {
					// errors in validator
				SetalertBox.text("");	
				dataArr = $.map(ret, function(value, index){ return value; });
				for(i = 0 ; i < dataArr.length ; i++){
					SetalertBox.append("<li>"+dataArr[i]+"</li>");
				}
				if($("#settings .alert").hasClass("hideElem") == true) $("#settings .alert").removeClass("hideElem");
				}
			});	
		
		});
}

