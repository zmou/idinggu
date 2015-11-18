<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>编辑资料-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>


<div style="margin-top:-20px;" class="ucenter_list">
		<ul>
		<li><b>头像</b> <p><div class="user_face" style="float:right; margin-right:5%;">
        <img src="<?php echo ($user_info["headimgurl"]); ?>" /></div></p></li>
		<li><b>姓名</b> <p><input name="name" type="text" value="<?php echo ($user_info["name"]); ?>"/></p></li>
		<li><b>性别</b> <p style="padding-top:10px;">
        <input name="sex" type="radio" value="1" <?php if(($user_info["sex"]) == "1"): ?>checked<?php endif; ?>/>男&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="sex" type="radio" value="2" <?php if(($user_info["sex"]) == "2"): ?>checked<?php endif; ?> />女</p></li>
	</ul>

	<ul>
		<li><b>身份证</b> <p><input name="id_card" type="text" value="<?php echo ($user_info["id_card"]); ?>"/></p></li>
        <li><b>开户行</b> <p><input name="bank_name" type="text" value="<?php echo ($user_info["bank_name"]); ?>"/></p></li>
		<li><b>银行卡</b> <p><input class="number" name="bank_card" type="text" value="<?php echo ($user_info["bank_card"]); ?>"/></p></li>
		<li><b>邮箱</b> <p><input name="email" type="text" value="<?php echo ($user_info["email"]); ?>"/></p></li>
		<li><b>手机</b> <p><input name="mobile" type="text" value="<?php echo ($user_info["mobile"]); ?>"/></p></li>
		<li><b>收货地址</b> <p><input id="address" name="shipping_address" type="text"  value="<?php echo ($user_info["shipping_address"]); ?>"/> </p></li>
	</ul>
	
	<ul>
		<li><b>生日</b> <p><input name="birthday" type="date" value="<?php echo ($user_info["birthday"]); ?>"/></p></li>
		<li><b>爱好</b> <p><input name="hobby" type="text" value="<?php echo ($user_info["hobby"]); ?>"/></p></li>
	</ul>
</div>

<!--<p class="font_red" style="text-indent:1em;">*完善资料可获得10个咕币</p>-->

<div class="myform">
	<ul>
		<li>
			<input type="button" value="保存资料" class="button1" id="btn-sub"/>
		</li>
	</ul>
</div>
</body>
<script>
$(function(){
	$("#btn-sub").click(function(){
		var post_data={};
		post_data.name=$("input[name='name']").val();
		post_data.sex=$("input[name='sex']").val();
		
		
		post_data.id_card=$("input[name='id_card']").val();
		post_data.bank_name=$("input[name='bank_name']").val();
		post_data.bank_card=$("input[name='bank_card']").val();
		
		post_data.email=$("input[name='email']").val();
		post_data.mobile=$("input[name='mobile']").val();
		post_data.shipping_address=$("input[name='shipping_address']").val();
		post_data.address=$("input[name='address']").val();
		
		post_data.birthday=$("input[name='birthday']").val();
		post_data.hobby=$("input[name='hobby']").val();
		
		
		
		if(post_data.name==''){
			alert('请填写姓名');
			$("input[name='name']").focus();
			return false;
		}
		
		if(post_data.sex==''){
			alert('请选择性别');
			return false;
		}
		
		if(!check_id_card(post_data.id_card)){
			alert('请填写正确的身份证号');
			$("input[name='id_card']").focus();
			return false;
		}
		
		if(post_data.bank_name==''){
			alert('请填写开户银行');
			$("input[name='bank_name']").focus();
			return false;
		}
		
		if(!bank_card(post_data.bank_card)){
			alert('请填写正确的银行卡号');
			$("input[name='bank_card']").focus();
			return false;
		}
		
		if(post_data.birthday==''){
			alert('请填写生日');
			$("input[name='birthday']").focus();
			return false;
		}
		
		if(!mobile(post_data.mobile)){
			alert('请填写正确的手机号');
			$("input[name='mobile']").focus();
			return false;
		}
		
		if(post_data.shipping_address==''){
			alert('请填写收货地址');
			$("input[name='shipping_address']").focus();
			return false;
		}
		
		if(post_data.hobby==''){
			alert('请填写爱好');
			$("input[name='hobby']").focus();
			return false;
		}
		
		//console.log(post_data);return;
		$.post("<?php echo U('Ajax/edit_data');?>",post_data,function(data){
			alert('保存成功');
		});
	});
});
</script>
</html>