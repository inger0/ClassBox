// 2.异步请求
	$.ajax({
		type:"post",
		url: './interface/main.php',
		async:true,
		success:function(data){
			console.log(data);
			$("body").html(data);
		}
	});