$(document).ready(function(){
	$("#agreement").click(function(){
		if($(this).attr("checked")){
			$(this).removeAttr("checked");
		}else{
			$(this).attr("checked","checked");
		}					   
	});	   
	$(".reg_form").validate({
		errorPlacement:function(error, element){
			error.appendTo(element.parent());
			element.parent().find("span").remove();
		},
		submitHandler : function(form) {
			if($("#year").val()=="0"||$("#month").val()=="0"||$("#day").val()=="0"){
				alert("please input birthday.");
			}else if($("#height").val()=="0"){
				alert("please input height.");
			}else if($("#address").val()=="0"){
				alert("please input address.");
			}else if($("#agreement").attr("checked")!="checked"){
				alert("please agree license.");
			}else{
				form.submit();
			}
		},
        rules: {
			name: { required: true },
			password: { required: true },
			email: { required: true, email: true }
		}
	});
});