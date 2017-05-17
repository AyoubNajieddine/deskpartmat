$(document).ready(function(){
	img = $(".flowImg");
	$(img[0]).css("border-bottom", "4px solid #006cc9");
	navigateImgRight();
	navigateImgLeft();
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
