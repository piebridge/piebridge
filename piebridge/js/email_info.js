var http_host = "http://xiaoqueqiao.com";
$(document).ready(function() {
	email_submit("top");
	email_submit("bottom");
	email_keydown("top");
	email_keydown("bottom");
	$.ajax( {
		type : "post",
		url : http_host+"/index.php?r=pop/Default/getnum",
		success : function(data) {
			$("#count").text(data);
		}
	});
});

function email_submit(name) {
	$("#submit_" + name).click(function() {
		var email = $("#email_" + name).val();
		if (checkEmail(email)) {
			$.ajax( {
				type : "post",
				url :  http_host+"/index.php?r=pop/Default/Email",
				data : {
					type : "insert",
					email : email
				},
				success : function(data) {
					alert("提交成功, 感谢您的支持.");
					location.reload();
				}
			});
		} else {
			alert("邮箱格式错误!");
		}
	});
}

function email_keydown(name) {
	$("#email_" + name).keydown(function() {
		$(this).prev().text("");
	});
}