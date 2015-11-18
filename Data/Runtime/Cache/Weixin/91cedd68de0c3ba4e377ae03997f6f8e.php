<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>我的订单-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/dialog.js" type="text/javascript"></SCRIPT>
<SCRIPT src="__PUBLIC__/js/alert.js" type="text/javascript"></SCRIPT>

<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>


<div style="margin-top:-15px;" class="index_tab2">
	<ul>
		<li><a href="<?php echo U('order_list',array('order_style'=>2, 'pay_status'=>0));?>" class="<?php if(($_GET['pay_status']) == "0"): ?>act<?php endif; ?>">进行中</a></li>
	    <li><a href="<?php echo U('order_list',array('order_style'=>2, 'pay_status'=>1));?>" class="<?php if(($_GET['pay_status']) == "1"): ?>act<?php endif; ?>">待收货</a></li>
	    <li><a href="<?php echo U('order_list',array('order_style'=>2, 'order_status'=>3));?>" class="<?php if(($_GET['order_status']) == "3"): ?>act<?php endif; ?>">已完成</a></li>
	</ul>
</div>

                
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="friend_order_list">
	<h1><span><?php echo ($status_name); ?></span> 还差<?php echo ($v["need_money"]); ?>元（已完成<?php echo ($v["percent"]); ?>%）</h1>
	<dl id="order_goods_<?php echo ($v["id"]); ?>">
		<?php if(is_array($v['goods'])): $i = 0; $__LIST__ = $v['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo U('Index/product_show', array('id'=>$g['goods_id']));?>"><img src="<?php echo ($g["goods_spic"]); ?>" border="0" /></a> </dt>
		<dd>
			<p><a href="<?php echo U('Index/product_show', array('id'=>$g['goods_id']));?>"><?php echo ($g["goods_name"]); ?></a></p>
			<p align="right">数量：<?php echo ($g["goods_nums"]); ?></p>  
			<p align="right">实付款：￥<?php echo (($v["payed_money"])?($v["payed_money"]):0); ?></p>
		</dd>
		<div style="clear:both;"></div>
		<div style="margin-top:10px; margin-bottom:10px;"></div><?php endforeach; endif; else: echo "" ;endif; ?>
	</dl>
	
	<ul>
		<!--<?php if(($_GET['pay_status']) == "0"): ?><a href="<?php echo U('cancel_order', array('id'=>$v['id']));?>">取消订单</a><?php endif; ?>-->
		
		<?php if(($_GET['pay_status']) == "1"): ?><a href="javascript:confirm_order(<?php echo ($v["id"]); ?>)">确认收货</a><?php endif; ?>

	    <a href="<?php echo U('order_detail', array('id'=>$v['id']));?>">订单详情</a> 

		<?php if(($v["pay_status"]) == "0"): ?><!--<a href="/wxpay/do/index.php?order_id=<?php echo ($v["id"]); ?>">自己支付</a>-->
		<a href="javascript:" class="share" order_sn="<?php echo ($v["order_sn"]); ?>" goods_name="<?php echo $g['goods_name'];?>" order_message="<?php echo ($v["order_message"]); ?>" imgurl="<?php echo $g['goods_spic'];?>">
			找人帮忙
		</a><?php endif; ?>
	</ul>
	<h2><b>1天后失效</b></h2>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<script type="text/javascript">

function confirm_order(order_id)
{
	$.post("<?php echo U('Ajax/confirm_order');?>",{'order_id':order_id},function(data){
		window.location.reload();
		//window.location.href = "<?php echo U('order_list',array('order_status'=>3));?>";		
	});
}

$('.share').click(function(){

	var link_url = "http://m.idinggu.com/index.php?m=Index&a=friend_ing&order_sn=";

	order_sn = $(this).attr('order_sn');
	order_message = $(this).attr('order_message');
	imgurl = "http://m.idinggu.com/"+$(this).attr('imgurl');
	goods_name = $(this).attr('goods_name');
	//alert(order_message+imgurl);

	alert('请点击右上角，分享到朋友圈或者发送给朋友！');

	//order_message = $(this).find("input[name='order_message']").val();
	//alert(order_sn);
	link_url += order_sn;
	//alert(link_url);
	//alert($(this).html());
	wx.onMenuShareAppMessage({
      title: goods_name,
	  desc: order_message,
	  link: link_url,
      imgUrl: imgurl,
	  type: '',
	  dataUrl: '',
      success: function (res) {
        //alert('已分享');
      },
      cancel: function (res) {
        //alert(link_url+$('#order_id').val());
		//alert(order_message+link_url);
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
	});
	wx.onMenuShareTimeline({
      title: goods_name,
	  desc: order_message,
	  link: link_url,
      imgUrl: imgurl,
      success: function (res) {
        //alert('已分享');
      },
      cancel: function (res) {
        //alert(link_url+$('#order_id').val());
		//alert(order_message+link_url);
      },
      fail: function (res) {
        alert(JSON.stringify(res));
      }
	});


	//link_url += $('#order_id').val(); not valid
	//alert(link_url);
});
</script>

<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">

wx.config({
    debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
	appId: '<?php echo ($jssign["appId"]); ?>', // 必填，公众号的唯一标识
    timestamp: <?php echo ($jssign["timestamp"]); ?>, // 必填，生成签名的时间戳
    nonceStr: '<?php echo ($jssign["nonceStr"]); ?>', // 必填，生成签名的随机串
	signature: '<?php echo ($jssign["signature"]); ?>',// 必填，签名，见附录1
    jsApiList: [
			'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareQQ',
			'onMenuShareWeibo'
	] 
			// 必填，需要使用的JS接口列表，所有JS接口列表见附录2

});

//alert(link_url);
wx.ready(function(){

	wx.checkJsApi({
		jsApiList: ['onMenuShareAppMessage'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
		success: function(res) {
			//alert(res.errMsg);
			// 以键值对的形式返回，可用的api值true，不可用为false
			// 如：{"checkResult":{"chooseImage":true},"errMsg":"checkJsApi:ok"}
		}
	});

});
</script>
</body>
</html>