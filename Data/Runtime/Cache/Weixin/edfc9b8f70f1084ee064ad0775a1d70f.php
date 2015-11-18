<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>订单详情-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background:#E1E1E1;}

.btn {
	background: #EC584D;
	font: normal 14px/25px "微软雅黑";
	color: #FFF;
	padding: 0 15px;
	border-radius: 5px;
}
</style>
</head>
<body>

<div class="header" style="position:relative">

	订单详情
	<div class="nav_r">

	</div>
</div>

<!--<div class="space10"></div>-->

<div class="white_bg">
	<div class="confirm_list">
		<ul>		
			<li>订单号：<?php echo ($info["order_sn"]); ?></li>
		</ul>
	</div>
	<?php if(is_array($order_goods)): $i = 0; $__LIST__ = $order_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="cart_list arrow_right">
		<dt style="width:30%;">
		<a href="<?php echo U('Index/product_show',array('id'=>$item['goods_id']));?>">
			<img src="<?php echo ($item["goods_spic"]); ?>" border="0" /></a> </dt>
		<dd>
		<b><a href="<?php echo U('Index/product_show',array('id'=>$item['goods_id']));?>"><?php echo ($item["goods_name"]); ?></a></b>

			<b align="right"><span style="float:left;">￥<?php echo ($item["trade_price"]); ?></span>数量：<?php echo ($item["goods_nums"]); ?>x<?php echo ($item["package_num"]); ?></b>
			<b align="right">实付款：￥<?php echo $item['trade_price']*$item['goods_nums']*$item['package_num'];?></b>  

		</dd>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="confirm_list">	
	<ul>
		<li>联系人 <span><?php echo ($info["consignee"]); ?></span></li>
		<li>联系电话 <span><?php echo ($info["mobile"]); ?></span></li>
		<li>收货地址 <span><?php echo ($info["address"]); ?></span></li>
		<li>下单时间 <span><?php echo (date('m.d H:i',$info["order_time"])); ?></span></li>

	</ul>

	<ul>		
		<li>留言<span><?php echo ($info["order_message"]); ?></span></li>
	</ul>

	<h2>
		<span class="font_red">
			实付款：￥<?php echo ($info["total_fee"]); ?>

		</span>
		&nbsp;
	</h2>
</div>

</body>
</html>