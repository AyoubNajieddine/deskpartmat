function getForm(tp){
		elem = $("#dynFrm");
	if(tp != -1){
	$.get("/new/frm/"+tp, function(data){
	elem.html(data);
	});
	}else {
	elem.html("");
	}
}
$("#newpart").ready(function(){
	//uploadFiles();
	$("select[name=ret_type]").change(function(){

			// in case the Type Is Changed
			type = $(this).val();
		        getForm(type);
	});
	//delThumb();
});
