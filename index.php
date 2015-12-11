<?php

/**
 * 微信接入验证
 * 在入口进行验证而不是放到框架里验证，主要是解决验证URL超时的问题
 */
if (! empty ( $_GET ['echostr'] ) && ! empty ( $_GET ["signature"] ) && ! empty ( $_GET ["nonce"] )) {
	$signature = $_GET ["signature"];
	$timestamp = $_GET ["timestamp"];
	$nonce = $_GET ["nonce"];
	
	$tmpArr = array (
			'dinggu',
			$timestamp,
			$nonce
	);
	sort ( $tmpArr, SORT_STRING );
	$tmpStr = sha1 ( implode ( $tmpArr ) );
	
	if ($tmpStr == $signature) {
		echo $_GET ["echostr"];
	}
	exit ();
}

define('THINK_PATH','./ThinkPHP/');
define('APP_NAME','App');
define('APP_PATH','./App/');
define('RUNTIME_PATH','./Data/Runtime/');
define('HTML_PATH', './Html');
define('APP_DEBUG',true);
require('./ThinkPHP/ThinkPHP.php');