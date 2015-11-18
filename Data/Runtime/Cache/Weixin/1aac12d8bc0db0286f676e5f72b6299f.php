<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>我的-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>
<dl class="ucenter_top" style="margin-top:-15px;" onclick='location.href="<?php echo U('edit_data');?>"'>
	<dt>
		<img src="<?php echo ($user_info["headimgurl"]); ?>" />
	</dt>
	<dd>
		<?php echo (($user_info["nickname"])?($user_info["nickname"]):'暂无'); ?>
	</dd>
</dl>

<div class="ucenter_total">
	<ul>
		<li><a href="<?php echo U('Ucenter/favorite');?>"><?php echo ($collect_count); ?><b>喜欢</b></a></li>
	    <li><a href="<?php echo U('Ucenter/jifen');?>"><?php echo ($user_info["jifen"]); ?> </a> <b>咕币 <i>
        <a id="-btn-sign">签到</a></i></b></li>
	    <li class="s"><?php echo (($user_info["money_account"])?($user_info["money_account"]):0); ?><b>余额 <i><a href="<?php echo U('Ucenter/recharge');?>">充值</a></i></b></li>
	</ul>
</div>

<div class="ucenter_list">
	<ul>
		<li class="s"><a href="#" class="a1">我的订单</a></li>
		<dl class="order_class">
			<dt><a href="<?php echo U('order_list',array('pay_status'=>1));?>">自己买</a></dt>
			<dd><a href="<?php echo U('order_list',array('pay_status'=>0, 'order_style'=>2));?>">好友请</a></dd>
		</dl>
	</ul>
	
		<ul>
		<li><a href="<?php echo U('feedback');?>" class="a2">投诉反馈</a></li>
	</ul>
	<?php if($user_info['role_id'] == 1): ?><ul>
		<li><a href="<?php echo U('apply_shopkeeper1');?>" class="a3">店长申请</a></li>
	</ul><?php endif; ?>
</div>

<div class="space60"></div>
<div id="bottomNav">
<!--底部导航-->
<!--<div id="bottomNav">-->
<div class="footer_menu">
	<ul>
		<li>
		<a href="/" <?php if((MODULE_NAME == 'Index') AND (ACTION_NAME == 'index')): ?>class="act"<?php endif; ?>>
			<?php if((MODULE_NAME == 'Index') AND (ACTION_NAME == 'index')): ?><img src="__PUBLIC__/images/index_r15_c3.png"/>
			<?php else: ?>
			<img src="__PUBLIC__/images/product_r12_c4.png"/><?php endif; ?>
			<span><?php if(($user_info["role_id"]) == "1"): ?>首页<?php else: ?>店面展示<?php endif; ?></span>
		</a>
		</li>
		<li>
		<a href="<?php if(($user_info["role_id"]) == "1"): echo U('Index/cart'); else: echo U('Ucenter/replenishment', array('cid'=>1)); endif; ?>"  <?php if((MODULE_NAME == 'Index') AND (in_array(ACTION_NAME,array('cart','cart2')))): ?>class="act"<?php endif; ?>>

			<?php if((MODULE_NAME == 'Index') AND (in_array(ACTION_NAME,array('cart','cart2')))): ?><img src="__PUBLIC__/images/product_r13_c7.png"/>
			<?php else: ?>
			<img src="__PUBLIC__/images/index_r16_c7.png"/><?php endif; ?>
			<?php if(($user_info["role_id"]) == "1"): ?><em class="cart-count"><?php echo (($cart_count)?($cart_count):0); ?></em><?php endif; ?>
			<span><?php if(($user_info["role_id"]) == "1"): ?>购物车<?php else: ?>补货<?php endif; ?></span>
		</a>
		</li>
		<li>
		<a href="<?php echo U('Ucenter/index');?>"  <?php if((MODULE_NAME == 'Ucenter') AND (in_array(ACTION_NAME,array('index','shop_center')))): ?>class="act"<?php endif; ?>>

			<?php if((MODULE_NAME == 'Ucenter') AND (in_array(ACTION_NAME,array('index','shop_center')))): ?><img src="__PUBLIC__/images/ucenter_r8_c7.png"/>
			<?php else: ?>
			<img src="__PUBLIC__/images/index_r14_c17.png"/><?php endif; ?>
			<span>我的</span>
		</a>
		</li>
	</ul>
</div>
<!--</div>-->

<!--底部导航-->
</div>
</body>
<script>
$(function(){
	$("#btn-sign").click(function(){
		$.post("<?php echo U('Ajax/sign');?>",{'act':'sign'},function(data){
			if(data==1){
				alert('签到成功');
			}else{
				alert('今天已经签过到了，明天再来吧');
			}
			location.reload();
		});
	});
});
</script>
</html>