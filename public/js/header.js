$("#header").ready(function(){
	loadLogin();
	loadRegister();
	hideElem();
});
function loadLogin(){
	$('a[href=login]').click(function(event){
		event.preventDefault();
		$("#null").addClass("null");
		$("#registerfrm").hide();	
		$("#loginfrm").show();
				
	});
}
function loadRegister(){
	$('a[href=register]').click(function(event){
		event.preventDefault();
		$("#null").addClass("null");
		$("#loginfrm").hide();
		$("#registerfrm").show();	
	});
}
function hideElem(){
	$("a.pull-left").click(function(){
		$("#null").removeClass("null");
		$(".frm").hide();
	});
}
