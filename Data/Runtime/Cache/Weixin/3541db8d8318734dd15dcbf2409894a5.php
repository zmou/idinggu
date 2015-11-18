<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>好友请进行中</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="friend_ing_top">
	<div class="face">
		<div class="user_face">
			<img src="<?php echo ($user_info["headimgurl"]); ?>" />
		</div>
	</div>
	
	<p><?php echo ($order_info["order_message"]); ?></p>
</div>

<div class="friend_list">
	<ul>
		<?php if(is_array($photo_list)): $i = 0; $__LIST__ = $photo_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$photo): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($photo["image"]); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>
<div class="white_bg">

<?php if(is_array($order_goods)): $i = 0; $__LIST__ = $order_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="cart_list arrow_right">
	<dt style="width:30%;">
		<a href="javascript:" onClick="new Dialog({type:'img',value:'<?php echo ($item["goods_spic"]); ?>'}).show();">
        <img src="<?php echo ($item["goods_spic"]); ?>" border="0" /></a> </dt>
	<dd>
	  <b><a href="<?php echo U('product_show',array('id'=>$item['goods_id']));?>"><?php echo ($item["goods_name"]); ?></a></b>
	  <b><i>￥<?php echo ($item["sub_total"]); ?> &nbsp;&nbsp;&nbsp;&nbsp;</i></b>
	</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>

<div class="friend_progress">
	<ul>
		<li>已完成<?php echo ($friend_order["percent"]); ?>% </li>
		<li class="money">还差：<span class="font_red">￥<?php echo ($friend_order["need_money"]); ?></span> </li>
		<li><?php echo ($friend_order["total_friends"]); ?>位支持者</li>
	</ul>
</div>

<div class="friend_detail">
	<h1>好友请详情</h1>
	<?php if(($total_friends) == "0"): ?><h2>还没有小伙伴为TA支付，快来抢沙发吧~</h2><?php endif; ?>
	<?php if(is_array($payed_friends)): $i = 0; $__LIST__ = $payed_friends;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$friend): $mod = ($i % 2 );++$i;?><dl>
		<dt><img src="<?php echo ($friend["headimgurl"]); ?>" /></dt>
		<dd><?php echo ($friend["message"]); ?></dd>
		<dd class="font_gray"><?php echo (date("Y-m-d",$friend["pay_time"])); ?></dd>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>
	
	<ul>
		<li>
			<b class="love" style="width:30%;">把爱大声说出来</b> <p><input name="" type="text" id="message" placeholder="分分钟就能凑满" class="talk"/></p>
		</li>
		<li>
			<b>支持TA</b> <p><input name="" id="pay_money" type="text" value="1" class="money"/>元</p>
		</li>
	</ul>
</div>

<div class="myform">
	<input name="" type="button" value="立即支付" class="button1 btn-pay" <?php if(($is_done) == "1"): ?>disabled<?php endif; ?>/>
</div>


<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/alert.js" type="text/javascript"></SCRIPT>
<script>
$(".btn-pay").click(function(){
	
	var post_data={};
	post_data.order_id = '<?php echo ($order_info["id"]); ?>';
	post_data.message = $("#message").val();
	post_data.pay_money = $('#pay_money').val();
	post_data.friend_openid = '<?php echo ($friend_info["openid"]); ?>';
	post_data.friend_headingurl = '<?php echo ($friend_info["headingurl"]); ?>';

	$.post("<?php echo U('Ajax/friend_pay');?>",post_data,function(json){
		//alert(json.friend_pay_id);
		if(json.friend_pay_id){
		
			goods_name = $('.cart_list b a').first().html();
			location.href="./wxpay/do/index.php?order_id="+json.order_id+"&order_name="+goods_name;			//跳转到微信支付页面
			location.href="http://m.idinggu.com/wxpay/do/index.php?order_id="+json.order_id+"&friend_pay_id="+json.friend_pay_id+"&pay_money="+json.pay_money+"&friend_openid="+json.friend_openid+"&order_name="+goods_name;			
			//跳转到微信支付页面
		}else{
			alert('error');
			//location.href = "<?php echo U('index/friend_buy');?>";
		}
		
	},'json')
	
});
</script>


</body>
</html>