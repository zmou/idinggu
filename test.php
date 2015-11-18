<?php

	$cust_code = '001025';									//账号
	$password = 'CXITIV9MLF';						//密码
	$sp_code = '106904561025';										//扩展码
	$content = '你好';					//发送内容
	$destMobiles = '18502983551';		 						//手机号码，使用逗号隔开可以发送多个号码
	$url='http://120.26.220.72:8860/';												//URL地址
	$post_data = array();
	$post_data['cust_code'] = $cust_code;																	
	$post_data['destMobiles'] = $destMobiles;									
	//$post_data['content'] =  mb_convert_encoding($content, 'utf-8', 'gb2312');
	$post_data['content'] = $content;
	$post_data['sign'] = md5(urlencode($content.$password));								//签名
	$post_data['sp_code'] = $sp_code;	
	$o="";
	foreach ($post_data as $k=>$v)
	{
		if($k =='content')
			$o.= "$k=".urlencode($v)."&";
		else
			$o.= "$k=".($v)."&";
	}
	$post_data=substr($o,0,-1);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL,$url);
	//为了支持cookie
	curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$result = curl_exec($ch);

	var_dump($result);
?>
