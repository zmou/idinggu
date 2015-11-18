<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>我的订单-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>

<div class="header" style="position:fixed; top:0; display:none;">
	<div>
		<a href="<?php echo U('Index');?>">返回</a>
	</div>
</div>

<div style="margin-top:-15px;" class="index_tab2">
	<ul>
	    <li style="width:50%;"><a href="<?php echo U('order_list',array('pay_status'=>1));?>" class="<?php if(($_GET['pay_status']) == "1"): ?>act<?php endif; ?>">待收货</a></li>
	    <li style="width:50%;"><a href="<?php echo U('order_list',array('order_status'=>3));?>" class="<?php if(($_GET['order_status']) == "3"): ?>act<?php endif; ?>">已完成</a></li>
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
		<?php if(($_GET['pay_status']) == "0"): ?><a href="<?php echo U('cancel_order', array('id'=>$v['id']));?>">取消订单</a><?php endif; ?>
		<?php if(($_GET['pay_status']) == "1"): ?><a style="color:red;" href="javascript:confirm_order(<?php echo ($v["id"]); ?>)">确认收货</a><?php endif; ?>
	    <a href="<?php echo U('order_detail', array('id'=>$v['id']));?>">订单详情</a> 

		<?php if(($v["pay_status"]) == "0"): ?><a href="javascript:goto_pay(<?php echo ($v["id"]); ?>, '<?php echo ($v["order_title"]); ?>_')" class="goto_pay" order_id="<?php echo ($v["id"]); ?>">去支付</a><?php endif; ?>
	</ul>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

<p><?php echo ($page); ?></p>



<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/alert.js" type="text/javascript"></SCRIPT>
<script type="text/javascript">
function goto_pay(order_id, order_title)
{
	location.href="./wxpay/do/index.php?order_id="+order_id+"&order_name="+order_title;			//跳转到微信支付页面
}

function confirm_order(order_id)
{
	/*
			$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'add', 'package_num':package_num},function(data){
				if(data==1){location.reload();}																				
			});
			*/

	$.post("<?php echo U('Ajax/confirm_order');?>",{'order_id':order_id},function(data){
		window.location.reload();
		//window.location.href = "<?php echo U('order_list',array('order_status'=>3));?>";		
	});
}
</script>
</body>
</html>