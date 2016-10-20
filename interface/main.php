<?php
	/*
	 * 获取 课程表
	 */
	include_once('config.php');
	$main_url = BASEURL."/f/xk/xs/bxqkb";
	$log_path = ROOT."/".$_COOKIE['user'].".txt";
	$main = curl_init();
	curl_setopt($main,CURLOPT_URL,$main_url);
	curl_setopt($main,CURLOPT_REFERER,"http://202.194.15.33:21043");
	curl_setopt($main,CURLOPT_POST, true);
	curl_setopt($main,CURLOPT_HEADER,0);
	curl_setopt($main,CURLOPT_RETURNTRANSFER,true);
	/*读取 cookie*/
	if(file_exists($log_path)){
		curl_setopt ($main, CURLOPT_COOKIEFILE, $log_path); // 读取上面所储存的Cookie信息  
	}else{
		echo -1;
		exit;
	}
  	curl_setopt ($main, CURLOPT_TIMEOUT, 30 ); // 设置超时限制防止死循环  
    curl_setopt ($main, CURLOPT_HEADER, 0); // 显示返回的Header区域内容  
	$return = curl_exec($main);
	curl_close($main);
	
	$str=preg_replace("/<(style.*?)>(.*?)<(\/style.*?)>/si","",$return);//过滤style标签
	$str=preg_replace("/<(link.*?)>(.*?)<(\/.*?)>/si","",$str);//过滤link标签
	$str=preg_replace("/<(a.*?)>(.*?)<(\/a.*?)>/si","",$str);//过滤a标签
	$str=preg_replace("/<(li.*?)>(.*?)<(\/li.*?)>/si","",$str);//过滤li标签
	
	/*做一下 最后的替换*/
	$str=preg_replace("/row-fluid/","row-fluid-last",$str,2);//过滤a标签
	$str=preg_replace("/row-fluid-last/","row-fluid",$str,1);//过滤a标签
	print_r($str);	
?>