$("#myretail").ready(function()	{
	loadDelRet();
	hideDel();
	delRet();
});
function loadDelRet(){
	$("a[href=delret]").click(function(event){
		event.preventDefault();
		val = $(this).attr("data-id");	
		$("#delretfrm .inp").attr("href",val);
		$("#null").addClass("null");
		$("#settings").hide();	
		$("#loginfrm").hide();
		$("#registerfrm").hide();	
		$("#delretfrm").show();
	});
}
function hideDel(){
	$("a[href=canret]").click(function(event){
		event.preventDefault();
		$("#null").removeClass("null");
		$(".frm").hide();
	});
}
function delRet(){
	$("#delretfrm .inp").click(function(event){
		event.preventDefault();
			// using ajax post method 
		id = $(this).attr("href");
		token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
			// in case success 
		$.post("/delret/",{id:id, _token:token}, function(){
		document.location = "/list";
		});
	});
}

