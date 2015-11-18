<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>营业状态-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/checkbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/alert.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>

<div style="margin-top:-15px;" class="ucenter_list">
	<ul>
		<li>
			<b>是否营业</b> 
			<p class="font_blue" style="padding-top:8px;">
                <input name="shop_status" value="1" class='tgl tgl-light' id='cb1' type='checkbox' <?php if(($shop_status) == "1"): ?>checked="checked"<?php endif; ?> />
                <label class='tgl-btn' for='cb1' style="margin-left:70%;"></label>
			</p>
		</li>
	</ul>
</div>

<p style="padding:0 20px;">
系统默认营业时间为21:00—23:00，其他时间由店长自行决定；在系统默认时间段如遇特殊情况，店长也可以选择自行将其关闭
</p>

<div class="myform" style="display:none;">
	<ul>
		<li>
			<input type="button" value="确定" class="button1" id="btn-sub"/>
		</li>
	</ul>
</div>
</body>
<script>

$(function(){
	$('#cb1').change(function(){
		var shop_status=$("input[name='shop_status']:checked").val();
		if(typeof(shop_status)=='undefined'){
			shop_status=0;
		}
		$.post("<?php echo U('Ajax/shop_status');?>",{'shop_status':shop_status},function(data){
			//alert('操作成功');
			location.href="<?php echo U('shop_center');?>";
		});
		//alert(shop_status);
		//alert();
	});
	$("#btn-sub").click(function(){
		var shop_status=$("input[name='shop_status']:checked").val();
		if(typeof(shop_status)=='undefined'){
			shop_status=0;
		}
		$.post("<?php echo U('Ajax/shop_status');?>",{'shop_status':shop_status},function(data){
			alert('操作成功');
		});
	});
});
</script>
</html>