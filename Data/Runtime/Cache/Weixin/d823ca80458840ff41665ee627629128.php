<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?php echo ($info["title"]); ?>-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header" style="position:relative">
	<div class="nav_l">
	<a href="javascript:history.go(-1);">返回</a>
	</div>
	<?php echo ($info["title"]); ?>
	<div class="nav_r">
	
	</div>
</div>

<!--<div class="space10"></div>-->
<div class="content1">
  <p><?php echo (stripcslashes(htmlspecialchars_decode($info["content"]))); ?></p>
</div>
</body>
</html>