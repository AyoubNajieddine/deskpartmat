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
	uploadFiles();
	$("select[name=ret_type]").change(function(){

			// in case the Type Is Changed
			type = $(this).val();
		        getForm(type);
	});
	delThumb();
});
function addImage(src, name, len){
			/* adding hidden fields with the name of 
			   the pictures so we can send them to database
			*/
		
		appData = "<input  type='hidden' name='pics[]' value='"+name+"'/>";
		$("#newpart form").append(appData);
			/*
			   adding picture division view
			   so we can delete theme 
			*/
		$("#img_div").append("<div class='thumb_div pull-right'"+len+" ><span class='glyphicon glyphicon-remove-sign thumb_cls text-danger' target='"+name+"' target-data='.thumb_div "+len+"' ></span><img class='img-thumbnail upl_list' width='100px' height='100px' src='"+src+"'></div>");
		
}
function uploadFiles(){
			// we need to make good css uploaded using javascript and ajax
		var reader = new FileReader();
		$("#upld").change(function(){
		obj = $(this)[0].files[0]; // we have one file here
		data = new FormData();	
		token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
		data.append("_token", token);
		data.append("img", obj);
		$.ajax({
		    url: '/upld',
		    data: data,
		    cache: false,
		    contentType: false,
		    processData: false,
		    type: 'POST',
			success:function(res){
				reader.onload = function(){
				src = reader.result;
				len = $(".thumb_div").length;
				addImage(src, res, len);
				}
			reader.readAsDataURL(obj);
			}
			});
	
		});
}
function delThumb(){
	$(document).on('click','.thumb_cls',function(){
		token = $("meta[name=csrf-token]").attr("content");
		elem =  $(this)[0].parentElement;
		src = $(this).attr("target");
		$(elem).remove();
		$("input[value='"+src+"']").remove();
		$.post("/delpic", {_token:token,src:src});// we still can do post method
	});
}
