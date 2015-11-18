<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>在线充值-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
.on{border:1px solid #EC584D !important}
</style>
</head>
<body>
<script type="text/javascript">
var perDiv=null;
function chgColor(_this)
{
  if(perDiv) perDiv.style.borderColor='';
  _this.style.borderColor='#EC584D';
  perDiv=_this;
}
</script>

<div style="margin-top:-13px;" class="recharge_list">
  <ul>
		<li>余额：￥<?php echo ($user_info["money_account"]); ?></li>
		<li>请选择：
        <?php if(is_array($conf)): $i = 0; $__LIST__ = $conf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><!--		  <input type="radio" name="money" value="<?php echo ($item["money"]); ?>" id="<?php echo ($item["money"]); ?>y" style="display:none"/>-->
          <label class="box" for="<?php echo ($item["money"]); ?>y" _onclick='chgColor(this)' value="<?php echo ($item["money"]); ?>"><?php echo ($item["money"]); ?>元</label>&nbsp;&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
         <!--<a style="border-radius:3px;" id="btn-diy">自定义金额</a> -->
		</li>
		<!--<li style="padding-left:60px;display:none" id="diy-input">
		  <input name="money" type="text" placeholder="请输入充值金额" class="number"/> 元
		</li>-->
	</ul>
</div>

<p style="line-height:45px; padding-left:10px;">充值方式</p>
<div id="radiolist" style="padding:10px; font-size:14px; ">
<div class="recharge_list">
  <ul>
		<li class="ico1"><span><input name="radio" type="radio" value="1" checked="checked" />
		</span>微信充值</li>
		<!--<li class="ico2"><span><input name="radio" type="radio" value="ali" /></span>支付宝充值</li>
		<li class="ico3"><span><input name="radio" type="radio" value="up" /></span>银联充值</li>-->
	</ul>
</div>
</div>

<div class="myform">
	<input type="button" value="我要充值" class="button1" id="btn-sub" />
</div>
</body>

<script>
$(function(){
	$(".box").click(function(){
		$('.box').removeClass('on');
		$(this).addClass('on');
	});
	
	$("#btn-diy").click(function(){
		$('.box').removeClass('on');
		$("#diy-input").slideToggle();
	});
	$("#btn-sub").click(function(){
		var post_data={};
		var money=$(".on").attr('value');
		post_data.money=money;
		//alert(typeof(post_data.money));return ;
		if(typeof(post_data.money)=='undefined'){
			alert('请选择充值金额');
			return false;
		}else{
			$.post("<?php echo U('Ajax/recharge');?>",post_data,function(data){
				//alert(data);
				location.href="./wxpay/do/recharge.php?order_id="+data;
			})
		}
	});
});
</script>
</html>