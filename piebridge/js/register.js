$(document).ready(function(){
	$(".reg_form").validate({
		submitHandler : function(form) {
			if($("#year").val()=="0"||$("#month").val()=="0"||$("#day").val()=="0"){
				alert("please input birthday.");
			}else if($("#height").val()=="0"){
				alert("please input height.");
			}else if($("#address").val()=="0"){
				alert("please input address.");
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