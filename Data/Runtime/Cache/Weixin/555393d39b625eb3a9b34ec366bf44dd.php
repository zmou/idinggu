<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>提现-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>
<div class="money_ok">
	<p align="center"><img src="__PUBLIC__/images/money_ok.png" /></p>
	<h1>提现申请成功</h1>
	
	<?php echo ($webinfo["withdraw_desc"]); ?>
</div>

<div class="myform">
	<ul>
		<li>
		<a href="<?php echo U('shop_center');?>"><input name="" id="do_submit" type="button" value="确定" class="button1"/></a>
		</li>
	</ul>
</div>
</body>
</html>