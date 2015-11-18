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
		<li><img src="__PUBLIC__/images/shopkeeper2_r2_c2.png" /><span>了解叮咕</span></li>
	    <li><img src="__PUBLIC__/images/shopkeeper_r2_c6.png" /><span>填写申请</span></li>
	    <li class="s act"><img src="__PUBLIC__/images/shopkeeper_r3_c5_r2_c2.png" /><span>申请成功</span></li>
	</ul>
</div>
<div style="margin-top:86px;"></div>
<div class="content1">
	<p align="center">	恭喜您，申请开店成功，</p>
	<p align="center">小咕会尽快与你联系！ </p>
</div>

<div class="myform">
	<ul>
		<li>
			<input onclick='location.href="<?php echo U('Ucenter/index');?>"' type="button" value="确定" class="button1"/>
		</li>
	</ul>
</div>
</body>
</html>