$(document).ready(function(){
	// setting up ajax
  
//uploadFiles();
  $.ajaxSetup({
     headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
  });
	//$(".chev_link").click(function());
	$(".edit_opt").click(function(event){
		event.preventDefault();
		data = $(this).attr("data");
		console.log(data);
		$(".disDiv").removeClass("addClsShow");
		$(data).addClass("addClsShow");
	});
  $("form").submit(function(event){
	event.preventDefault();
	param = $(this).serialize();
	action  = $(this).attr("action");
	method  = $(this).attr("method");
	$.ajax({
	method:method, 
	url:action,
	data:param,
	success:function(ret){
		if(ret.length != 0){
		prop = Object.keys(ret)[0];
		$(".alert").show();
		$(".alert ul").html("<li>"+ret[prop]+"</li>");
		}
		else {
			$(".alert").hide();
			document.location = "/list";
		}
	}
  	});
	//console.log($(this).serializeArray());
  	
  });
});
