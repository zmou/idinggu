<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>咕币-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<!--弹出层2-->
<link href="__PUBLIC__/css/dialog.css" type="text/css" rel="stylesheet">
<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/dialog.js" type="text/javascript"></SCRIPT>
<!--[if lte IE 8]>
<SCRIPT src="__PUBLIC__/js/html5.js" type=text/javascript></SCRIPT>
<![endif]-->
</head>
<body>
<div class="coin_top" style="margin-top: -15px">
	<dl>
		<dt  _onClick="new Dialog({type:'id',value:'remainder'}).show();"><?php echo ($user_info["jifen"]); ?></dt>
		<dd>
			<p id="btn-sign"><span class="sign">签到</span></p>
			<p>每日签到可领<?php echo ($conf['sign']); ?>个咕币</p>
		</dd>
	</dl>

	<i><a href="<?php echo U('jifen_list');?>">明细</a></i>
	
	<em><a href="<?php echo U('Cms/read',array('id'=>2));?>">咕币规则</a></em>
</div>

<div class="coin_title"><b>更多咕币奖励</b></div>
<div class="reward_list">
	<ul>
	<li class="bg1"><a href="<?php echo U('product_list',array('cid'=>$item['id']));?>">完成好友请</a> <span>10</span></li>
	    <li class="bg2"><a href="<?php echo U('edit_data');?>">完善资料</a> <span>10</span></li>
	</ul>
</div>

<div class="coin_title"><b>咕币兑换</b></div>


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="goods_list">
	<dt>
		<a href="javascript:" onClick="new Dialog({type:'img',value:'<?php echo ($item["spic"]); ?>'}).show();"><img src="<?php echo ($item["spic"]); ?>" border="0" /></a> </dt>
	<dd>
	  <b><a href="<?php echo U('jifen_cart', array('id'=>$item['id']));?>"><?php echo ($item["name"]); ?></a></b>
	  <b class="font_red">所需咕币：<?php echo ($item["price"]); ?></b>
	  <b><span><a href="<?php echo U('jifen_cart', array('id'=>$item['id']));?>" class="btn">兑换</a></span> <s>￥<?php echo ($item["market_price"]); ?></s> </b>  
	</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>

<div id="remainder" style="display:none;">
		<p>您的咕币不足500，请赚取更多的咕币再来吧</p>
		<dl class="order_class">
			<dt class="font_red"><a href="#">如何赚取</a></dt>
			<dd>知道了</dd>
		</dl>
</div>


</body>
<script>
$(function(){
	$("#btn-sign").click(function(){
		$.post("<?php echo U('Ajax/sign');?>",{'act':'sign'},function(data){
			if(data==1){
				alert('签到成功');
				location.reload();
			}else{
				alert('今天已经签过到了，明天再来吧');
			}
			
		});
	});
});
</script>
</html>