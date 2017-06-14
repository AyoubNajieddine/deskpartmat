$(document).ready(function(){
	subscribe();
});
function subscribe(){

$("form[action=subsfrm]").submit(function(event){	
	event.preventDefault();
	SetalertBox = $(this).children(".alrt");
	SetalertBox.text("");
	email = ($(this).children("input[type=text]")).val();
	//notify =($(this).children("input[type=checkbox]"))[0];
	notify  = $("#notify")[0].checked;
	token = $("meta[name=csrf-token]").attr("content"); // is the value of csrf token
	$.post("/subs/",{notify:notify, email:email, _token:token},function(ret){
		if(typeof(ret) == "object"){
			dataArr = $.map(ret, function(value, index){ return value; });
			for(i = 0 ; i < dataArr.length ; i++){
				//SetalertBox.append(dataArr[i]);
				SetalertBox.html("<span class='text-danger'><span class='glyphicon glyphicon-remove'></span> "+dataArr[i]+"</span>");
			}
		}
		if(typeof(ret) == "string"){
				SetalertBox.html("<span class='text-success'><span class='glyphicon glyphicon-ok'></span> "+ret+"</span>");
		}
	});

});

}
