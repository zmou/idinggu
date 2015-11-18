<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>投诉反馈</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background:#E1E1E1;}
</style>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
</head>
<body>

<div style="margin-top:-20px;" class="confirm_list">
		<ul>
		<li>
			<div class="sel_wrap">
				<label>请选择反馈类型</label>
				<select class="select" name="type" id="c_city">
				<option value="">请选择反馈类型</option>
				<option value="1">功能意见</option>
				<option value="2">页面意见</option>
				<option value="3">操作意见</option>
				<option value="4">其他</option>
				</select>
			</div>
    <!--下拉菜单美化-->
    <script type="text/javascript"> 
    $(".sel_wrap").on("change", function() {
    var o;
    var opt = $(this).find('option');
    opt.each(function(i) {
    if (opt[i].selected == true) {
    o = opt[i].innerHTML;
    }
    })
    $(this).find('label').html(o);
    }).trigger('change');
    </script>


		</li>
	</ul>

	<ul>
		<li>
		  <textarea name="content" placeholder="有你的意见，小咕会做的更好~"></textarea>
		</li>
	</ul>
	
	<ul>
		<li><input name="email" type="text" placeholder="请输入您的邮箱"/></li>
		<li><input name="mobile" type="text" placeholder="请输入您的手机"/></li>
	</ul>
	
</div>

<div class="myform">
	<ul>
		<li>
			<input type="button" value="提交" class="button1" id="btn-sub"/>
		</li>
	</ul>
</div>
</body>
<script>
$(function(){
	$("#btn-sub").click(function(){
		var post_data={};
		post_data.type=$("select[name='type']").val();
		post_data.content=$("textarea[name='content']").val();
		post_data.email=$("input[name='email']").val();
		post_data.mobile=$("input[name='mobile']").val();
		if(post_data.type==''){
			alert('请选择反馈类型');
			$("select[name='type']").focus();
			return false;
		}
		if(post_data.content==''){
			alert('请填写反馈内容');
			$("textarea[name='content']").focus();
			return false;
		}
		if(post_data.email==''){
			alert('请填写电子邮箱');
			$("input[name='email']").focus();
			return false;
		}
		if(post_data.mobile==''){
			alert('请填写11位手机号码');
			$("input[name='mobile']").focus();
			return false;
		}
		$.post("<?php echo U('Ajax/feedback');?>",post_data,function(data){
			alert('提交反馈成功');
			location.reload();
		});
	});
});
</script>
</html>