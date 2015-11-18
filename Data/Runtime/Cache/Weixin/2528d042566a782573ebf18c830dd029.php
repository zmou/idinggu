<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>销售订单-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>

<style type="text/css">
body{ background:#E1E1E1;}
</style>

</head>
<body>


<div style="margin-top:-15px;" class="index_tab">
	<ul>
		<li><a href="<?php echo U('shop_order',array('order_status'=>1));?>" <?php if(($order_status) == "1"): ?>class="act"<?php endif; ?>>待配送</a></li>
		<li><a href="<?php echo U('shop_order',array('order_status'=>3));?>" <?php if(($order_status) == "3"): ?>class="act"<?php endif; ?>>已完成</a></li>
	</ul>
</div>


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="friend_order_list" id="order_<?php echo ($v["id"]); ?>">
	
	<dl>
		<?php if(is_array($v['goods'])): $i = 0; $__LIST__ = $v['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo U('Index/product_show', array('id'=>$g['goods_id']));?>"><img src="<?php echo ($g["goods_spic"]); ?>" border="0" /></a> </dt>
		<dd>
			<p><a href="<?php echo U('Index/product_show', array('id'=>$g['goods_id']));?>"><?php echo ($g["goods_name"]); ?></a></p>
			<p align="right">数量：<?php echo ($g["goods_nums"]); ?></p>  
			<p align="right">实付款：￥<?php echo $g['goods_price']*$g['goods_nums'];?></p>  
		</dd>
		<div style="clear:both;"></div>
		<div style="margin-top:10px; margin-bottom:10px;"></div><?php endforeach; endif; else: echo "" ;endif; ?>
	</dl>
	
	<ul>
		<span style="float:left;margin-left:10px;">下单时间：<?php echo (date("m.d H:i",$v["order_time"])); ?></span>
		<a href="<?php echo U('order_detail', array('id'=>$v['id']));?>">订单详情</a>
	</ul>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

<p><?php echo ($page); ?></p>

<?php if(empty($list)): ?><p><center>暂无数据</center></p><?php endif; ?>

<?php if(strlen($page) > 1): ?><p id="page"><?php echo ($page); ?></p><?php endif; ?>

<div class="line2"></div>
</body>
</html>