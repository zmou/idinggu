<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>咕币兑换订单-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript"> 
$(function(){
   $(".index_tab li a").each(function(){
    if(window.location.href.indexOf($(this).attr("href"))>=0){
        $(this).addClass("act");
    }
})
   $(".index_tab li a").click(function(){
         $(this).parent().siblings("li ").find("a").removeClass("act")
         $(this).addClass("act");
   });
})
</script>
</head>
<body>

<div class="header" style="position:relative">
	
	咕币兑换订单
	<div class="nav_r">
	
	</div>
</div>

<div class="space10"></div>

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="goods_list">
	<dt>
		<a href="#"><img src="<?php echo ($item['goods']['goods_spic']); ?>" border="0" /></a> 
    </dt>
	<dd>
	  <b><a href="#"><?php echo ($item['goods']['goods_name']); ?></a> X <?php echo ($item['goods']['goods_nums']); ?></b>
	</dd>
    <dd>
      <b>订单号：<?php echo ($item["order_sn"]); ?></b>
      <b>兑换日期：<?php echo (date('Y-m-d H:i:s',$item["order_time"])); ?></b>
      <b>订单金额：<?php echo ($item["total_fee"]); ?> 咕币</b>  
	  <b>收货人：<?php echo ($item["consignee"]); ?></b>
      <b>联系电话：<?php echo ($item["mobile"]); ?></b>
	  <b>收货地址：<?php echo ($item["province"]); ?>-<?php echo ($item["city"]); ?>-<?php echo ($item["district"]); ?>-<?php echo ($item["address"]); ?></b>  
      <b>订单状态：
      <?php switch($item["order_status"]): case "1": ?><font style="color:#F00;font-weight:700">等待发货</font><?php break;?>
      <?php case "2": ?>已发货<?php break;?>
      <?php case "3": ?><font style="color:#090;font-weight:700">已完成<?php break; endswitch;?>
      </b>
	</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>


<?php if(strlen($page) > 1): ?><p id="page"><?php echo ($page); ?></p><?php endif; ?>

<div class="line2"></div>
</body>
</html>