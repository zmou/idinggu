<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>申请店长</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="apply_shopkeeper_step">
	<ul>
		<li class="act"><img src="__PUBLIC__/images/shopkeeper_r2_c2.png" /><span>了解叮咕</span></li>
	    <li><img src="__PUBLIC__/images/shopkeeper_r2_c6.png" /><span>填写申请</span></li>
	    <li class="s"><img src="__PUBLIC__/images/shopkeeper_r2_c8.png" /><span>申请成功</span></li>
	</ul>
</div>

<div class="content1">
<p><?php echo (stripcslashes(htmlspecialchars_decode($article["content"]))); ?></p>
</div>

<div class="myform" style="position:fixed; bottom:0; background:#fff;">
	<input name="" type="button" value="下一步" class="button1" onclick="location.href='<?php echo U("apply_shopkeeper2");?>'"/>
</div>
</body>
</html>