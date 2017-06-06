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
});
