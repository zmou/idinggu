<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>编辑资料</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body onLoad="setup();preselect('陕西省');promptinfo();">
<div class="space10"></div>

<div class="ucenter_list">
		<ul>
		<li><b>头像</b> <p><div class="user_face" style="float:right; margin-right:5%;">
        <img src="<?php echo ($user_info["headimgurl"]); ?>" /></div></p></li>
		<li><b>姓名</b> <p><input name="name" type="text" value="<?php echo ($user_info["name"]); ?>"/></p></li>
		<li><b>性别</b> <p style="padding-top:10px;">
        <input name="sex" type="radio" value="1" <?php if(($user_info["sex"]) == "1"): ?>checked<?php endif; ?>/>男&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="sex" type="radio" value="2" <?php if(($user_info["sex"]) == "2"): ?>checked<?php endif; ?> />女</p></li>
	</ul>

	<ul>
		<li><b>身份证</b> <p><input name="idcard" type="text" value="<?php echo ($user_info["idcard"]); ?>"/></p></li>
		<li><b>银行卡</b> <p><input name="bankcard" type="text" value="<?php echo ($user_info["bankcard"]); ?>"/></p></li>
		<li><b>邮箱</b> <p><input name="email" type="text" value="<?php echo ($user_info["email"]); ?>"/></p></li>
		<li><b>手机</b> <p><input name="mobile" type="text" value="<?php echo ($user_info["mobile"]); ?>"/></p></li>
	</ul>
	
	<ul>
		<li><b>生日</b> <p><input name="birth_day" type="date" value="<?php echo ($user_info["birth_day"]); ?>"/></p></li>
		<li><b>爱好</b> <p><input name="hobby" type="text" value="<?php echo ($user_info["hobby"]); ?>"/></p></li>
	</ul>
</div>

<p class="font_red" style="text-indent:1em;">*完善资料可获得10个咕币</p>

<div class="myform">
	<ul>
		<li>
			<input type="button" value="保存资料" class="button1"/>
		</li>
	</ul>
</div>
</body>
</html>