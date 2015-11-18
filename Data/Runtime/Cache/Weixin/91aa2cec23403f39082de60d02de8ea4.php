<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>店长中心-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/alert.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>

<dl style="margin-top:-15px;" class="ucenter_top" onclick='location.href="<?php echo U('edit_data');?>"'>
	<dt>
	<img src="<?php echo ($user_info["headimgurl"]); ?>" />
	</dt>
	<dd>
	<?php echo ($user_info['name']); ?>
	</dd>
</dl>

<div class="ucenter_total2">
	<ul>
		<li><a href="#"><?php echo (($today_order_count)?($today_order_count):0); ?><b>今日单量</b></a></li>
		<li><a href="#">￥<?php echo (($today_income)?($today_income):0); ?><b>今日收益</b></a></li>
		<li class="s"><a id="take_money" href="javascript:">￥<?php echo ($user_info["money_account"]); ?><b style="color:green;">可提现</b></a></li>
	</ul>
</div>
<script type="text/javascript">
$('#take_money').click(function(){
var can_withdraw = '<?php echo ($can_withdraw); ?>';
if(can_withdraw == '0' && 0)
{
	alert('一天只能提现一次！');
	history.go(-1);
}
else
{
	location.href = "<?php echo U('take_money');?>";
}
});
</script>
<div class="ucenter_list">
	<ul>
		<!--<li><a href="shopkeeper_order.html" class="a1">我的订单</a></li>-->
		<li><a href="<?php echo U('shop_order');?>" class="a1">配送订单</a></li>
	</ul>
	<ul>
		<!--<li><a href="shopkeeper_order.html" class="a1">我的订单</a></li>-->
		<li><a href="<?php echo U('order_list', array('pay_status'=>1));?>" class="a2">补货订单</a></li>
	</ul>

	<ul>
		<li>
		<a href="<?php echo U('shop_state');?>" class="a4">营业状态 
			<span style="margin-right:10%;">
				<?php if(($shop["shop_status"]) == "1"): ?><font color='green'>营业中</font><?php else: ?><font color="red">未营业</font><?php endif; ?>
		</span></a>
		</li>
	</ul>

	<ul>
		<li class="s"><span><font color='green'><?php echo ($webinfo["shop_hot_line"]); ?></font></span><a href="#" class="a5">店长专线</a></li>
		<li><a href="<?php echo U('replenishment');?>" class="a6">我要补货</a></li>
		<li><a href="<?php echo U('Cms/read',array('id'=>5));?>" class="a7">店长须知</a></li>
		<li><a href="<?php echo U('Cms/read',array('id'=>6));?>" class="a7">店长协议</a></li>
	</ul>

</div>
<div class="space60"></div>

<div id="bottomNav">
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

</div>
</body>
</html>