$(document).ready(function(){
	img = $(".flowImg");
	$(img[0]).css("border-bottom", "4px solid #006cc9");
	navigateImgRight();
	navigateImgLeft();
	messageBox();
	sendMessage();
});
function loadMainImg(cursor){
	img = $(".flowImg");
	$("#mainImg").attr("src", img[cursor].src);	
	img.css("border-bottom","0px");	
	$(img[cursor]).css("border-bottom", "4px solid #006cc9");
}
function navigateImgLeft(){
	img = $(".flowImg");
	len = img.length;
	cursor = 0;
	$(".glyphicon-menu-left").click(function(){
	console.log("left");
		// navigate Left;
		cursor++;
		if(cursor > len-1 ) cursor = 0;
		loadMainImg(cursor);
	});

}
function navigateImgRight(){
		img = $(".flowImg");
		len = img.length;
	$(".glyphicon-menu-right").click(function(){
		// navigate Right
	console.log("right");
		cursor--
		if(cursor < 0) cursor = len -1
		loadMainImg(cursor)
	});
}
function messageBox(){
	$("#sendM").click(function(event){
		event.preventDefault();
		$("#null").addClass("null");
		$("#settings").hide();	
		$("#loginfrm").hide();
		$("#registerfrm").hide();
		$("#messgfrm").show();
	
	});		
}
function sendMessage(){
		SetalertBox = $("#settings .alert");
	$("#sendMForm").submit(function(event){
		event.preventDefault();
		message = ($(this).children("textarea")).val();
		action = $(this).attr("action");
		token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
		$.post(action, {message:message, _token:token}, function(ret){
			/*
			** if message was sent close the window 
			** else show error in the error box
			*/
		console.log(ret);
			if(typeof(ret) == "object"){

				SetalertBox.text("");	
				dataArr = $.map(ret, function(value, index){ return value; });
				for(i = 0 ; i < dataArr.length ; i++){
					SetalertBox.append("<li>"+dataArr[i]+"</li>");
				}
			}	
			else {
				
				$("#sendMForm textarea").val("");
				$("#null").removeClass("null");
				$(".frm").hide();
			}
		});

	});	
}
