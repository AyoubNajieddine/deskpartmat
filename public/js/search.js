sortElements();	
function sortElements(){
	search = document.location.search.substring(1).split("&");
	for(i = 0 ; i < search.length; i++){
		elempara = search[i].split("=");
		if(elempara[0] == "srt"){
		selectedElem = 0;
		if(elempara[1] > 0) selectedElem = elempara[1] - 1;
		$("#sortLst input[type=radio]").get(selectedElem).checked = true;
			break;
		}
	}
		
	$("#sortLst input[type=radio]").click(function(){
		// get the value of the selected input 
		sortBy = $(this).val();
		document.location = document.location.origin+document.location.pathname+"?srt="+sortBy;
	});	
}
