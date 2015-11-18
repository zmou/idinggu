<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="location_bg">
<div style="margin-top:-20px;" class="header">
	<div class="nav_l">
		<a href="<?php echo U('location_city');?>"></a>
	</div>
	<div class="nav_r">
		<a href="<?php echo U('location_city');?>">切换城市</a>
	</div>
</div>

<div class="space40"></div>

<div style="margin-top:-20px"  class="search">
	<div  class="box">
		<form action="index.php" method="get">
		<b><input name="school" type="text" placeholder="请输入学校名称查询" value="<?php echo ($_GET['school']); ?>"/></b>
		<p><input type="hidden" name="m" value="Index"/>
		<input type="hidden" name="a" value="location_school"/>
		<input type="hidden" name="city_id" value="<?php echo ($city_id); ?>"/>
		<input type="submit" class="btn" value=""/></p>

		</form>


	</div>
</div>

<?php if(is_array($county_list)): $i = 0; $__LIST__ = $county_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="school_list">
	<h1><?php echo ($key); ?></h1>
	<ul>
    	<?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li onclick='location.href="<?php echo U('location_building',array('sch_id'=>$val['id']));?>"' ><?php echo ($val['name']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(empty($county_list)): ?><div class="school_list">
	<p><center>该地区暂未开通</center></p>
</div><?php endif; ?>
</body>

</html>