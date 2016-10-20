var BASE_URL = "http://202.194.15.33:21043";

// 登录处理
function login() {
	// 1.登录表单处理
	$("#topmess").hide();
	var userLoginUrl = "./interface/login.php";
	var username = $("#username").val();
	var password = $("#password").val();
	if(username == ""){
		$("#usermess").show();
		return;
	}else if(password == ""){
		$("#passmess").val("请填写密码~~~");
		return;
	}
	// 2.异步请求
	$.ajax({
		type:"post",
		url: userLoginUrl,
		async:true,
		data:{
			"username":username,
			"password":password
		},
		success:function(data){
			console.log(data);
			if (data == "1") {
				window.location.href = "main.html";
			} else {
				$("#topmess").show();
			}
		}
	});
}

function keylog(){
	if (event.keyCode==13){
		login();
	}   //回车键的键值为13
  	   	
	
}
