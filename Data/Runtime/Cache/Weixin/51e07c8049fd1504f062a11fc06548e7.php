<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>确认订单-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background:#E1E1E1;}
</style>
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<!--数量加减-->
<script type="text/javascript"> 
 $(document).ready (function () 
    { 
 //var pl = $("p:last"); 
     var reg = /(.*[\:\：]\s*)([\+\d\.]+)(\s*元)/g; 
     $ (".sy_minus").click (function () 
     { 
     var me = $ (this), txt = me.next (":text"), pc = me.closest("p"); 
     var val = parseFloat (txt.val ()); 
     val = val < 1 ? 1 : val; 
     txt.val (val - 1); 
     var price = parseFloat (pc.prev("p").text().replace(reg,'$2')) * txt.val (); 
     pc.next("p").text (pc.next("p").text().replace(reg, "$1" + price + "$3")); 
     var sum = 0; 
     $(".p_num").next("p").each(function (i, dom) 
     { 
      sum += parseFloat ($(this).text().replace(reg, "$2")); 
     }); 
     pl.text(pl.text().replace(reg, "$1" + sum + "$3")); 
     }); 
       
     $(".sy_plus").click (function () 
     { 
      var me = $ (this), txt = me.prev (":text"), pc = me.closest("p"); 
     var val = parseFloat (txt.val ()); 
     txt.val (val + 1); 
     var price = parseFloat (pc.prev("p").text().replace(reg,'$2')) * txt.val (); 
     pc.next("p").text (pc.next("p").text().replace(reg, "$1" + price + "$3")); 
     var sum = 0; 
     $(".p_num").next("p").each(function (i, dom) 
     { 
      sum += parseFloat ($(this).text().replace(reg, "$2")); 
     }); 
     pl.text(pl.text().replace(reg, "$1" + sum + "$3")); 
     }); 
    })[0].onselectstart = new Function ("return false"); 
</script>

<!--弹出层2-->
<LINK href="__PUBLIC__/css/dialog.css" type="text/css" rel="stylesheet">
<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/dialog.js" type="text/javascript"></SCRIPT>
<!--[if lte IE 8]>
<SCRIPT src="__PUBLIC__/js/html5.js" type=text/javascript></SCRIPT>
<![endif]-->
</head>
<body>

<div class="space10"></div>

<div class="confirm_list">
	<h1><?php echo ($position['city']); ?>-<?php echo ($position['school']); ?></h1>
    <h1><?php echo ($position['build']); ?></h1>
	<ul>		
	    <li><b>寝室号</b> <p><input name="address" type="text" placeholder="请输入寝室号" value='123'/></p></li>
	    <li><b>手机号</b> <p><input name="mobile" type="text" placeholder="请输入手机号" value="<?php echo ($user_info["mobile"]); ?>"/></p></li>
	</ul>
</div>

<div class="white_bg">
	
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="cart_list">
		<dt style="width:30%;">
			<a href="javascript:" onClick="new Dialog({type:'img',value:'<?php echo ($item["spic"]); ?>'}).show();"><img src="<?php echo ($item["spic"]); ?>" border="0" /></a> </dt>
		<dd>
		<b><a href="<?php echo U('product_show',array('id'=>$item['goods_id']));?>"><?php echo ($item["name"]); ?></a></b>
		<b>
			  <p class="p_num"> 
				 <span class="sy_minus num_sub" id="sy_minus_gid1" goods_id="<?php echo ($item["goods_id"]); ?>">-</span>  
				 <input class="sy_num" id="sy_num_gid1" readonly="readonly" type="text" name="number1" value="<?php echo ($item["goods_nums"]); ?>" />  
				 <span class="sy_plus num_add" id="sy_plus_gid1" goods_id="<?php echo ($item["goods_id"]); ?>">+</span> 
		  </p>
				 <i>小计：￥<?php echo ($item['goods_price']); ?>x<?php echo ($item['goods_nums']); ?></i>
		  </b>
		</dd>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>
    
</div>

<div class="confirm_list">
	<ul>		
	    <li class="font_gray" style="text-align:right;">共<?php echo I('session.cart_goods_nums');?>件商品&nbsp;&nbsp;总金额：￥<?php echo ($total_fee); ?> </li>
	</ul>
	
	<ul>		
	    <li>
	      <textarea id="order_message" placeholder="请输入其他您想对店长说的话~"></textarea>
	    </li>
	</ul>
	
	<h2 style="color:red;">运费:￥0.00  &nbsp;&nbsp;合计:￥<?php echo ($total_fee); ?></h2>
</div>

<div class="new_play">
	<fieldset>
	<legend>新玩法</legend>
	<p>分享到朋友圈或者好友群等任何地方，每个好友都可以为你
	支付，凑齐后自动发货。</p>
	</fieldset>
</div>

<div class="confirm_btns">
	<ul>
		<li><input name="" type="button" value="好友请" class="b1 btn-friend" order_style="2"/></li>
		<li><input name="" type="button" value="自己买" class="b2 btn-self" _onClick="new Dialog({type:'id',value:'myself_buy'}).show();" order_style="1"/></li>
	</ul>
</div>
<!--
<?php if($total_fee >= $webinfo['user_min_amount']): else: ?>
<div class="confirm_btns">
	<ul>
		<li style="display:none;"><input type="button" value="好友请" class="b1" style="background:silver" onclick="alert('订单金额不足3元，不能下单')"/></li>
		<li style="float:right;"><input type="button" value="提交订单" class="b2" style="background:silver" onclick="alert('订单金额不足3元，不能下单')"/></li>
	</ul>
</div><?php endif; ?>
-->
<div id="myself_buy" style="display:none">
	<div class="myself_buy">
		<ul>
			<li class="font_gray">请选择支付方式</li>
			<li class="font_red"><a>微信支付</a></li>
<!--			<li><a href="#">支付宝支付</a></li>
			<li><a href="#">银联支付</a></li>-->
		</ul>
	</div>
</div>
</body>
<style>
.on{color:#090}
</style>
<script>
$('.btn-friend').click(function(){
		
	var post_data={};
	post_data.address=$("input[name='address']").val();		//寝室号
	post_data.mobile=$("input[name='mobile']").val();

	if(post_data.address==''){
		alert('请填写寝室号');
		$("input[name='address']").focus();
		return false;
	}
	if(post_data.mobile==''){
		alert('请填写手机号');
		$("input[name='mobile']").focus();
		return false;
	}
	address=$("input[name='address']").val();		//寝室号
	mobile=$("input[name='mobile']").val();
	location.href = "<?php echo U('friend_buy', array('address'=>'"+address+"', 'mobile'=>'"+mobile+"'));?>";		
});
$(".btn-self").click(function(){
	var post_data={};
	post_data.address=$("input[name='address']").val();		//寝室号
	post_data.mobile=$("input[name='mobile']").val();
	post_data.order_message=$("#order_message").val();

	post_data.order_style=$(this).attr('order_style');				//自己支付
	//alert(post_data.order_style);
	//return false;
	if(post_data.address==''){
		alert('请填写寝室号');
		$("input[name='address']").focus();
		return false;
	}
	if(post_data.mobile==''){
		alert('请填写手机号');
		$("input[name='mobile']").focus();
		return false;
	}
	$.post("<?php echo U('Ajax/order');?>",post_data,function(json){
		//alert(json.error_msg);return false;
		if(json.error_msg)
		{
			alert(json.error_msg);
			return false;
		}
		if(json.order_style==1){
			//alert(json.order_id);
			goods_name = $('.cart_list b a').first().html();
			location.href="./wxpay/do/index.php?order_id="+json.order_id+"&order_name="+goods_name;			//跳转到微信支付页面
		}else{
			//alert('朋友请');
			//location.href = "<?php echo U('index/friend_buy');?>";
		}
		
	},'json')
	
});

$(function(){
	$(".num_add").live('click',function(){
		var goods_id=$(this).attr('goods_id');
		/*var this_nums=$(this).siblings('.sy_num').va();
		$(this).siblings('.sy_num').val(parseInt(this_nums)+1);*/
		if(parseInt(goods_id)>0){
			$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'add'},function(data){
				location.reload();
			});
		}
		
	});		
	
	$(".num_sub").live('click',function(){
		var goods_id=$(this).attr('goods_id');
		if(parseInt(goods_id)>0){
			//var this_nums=$(this).parent('p').siblings('i>goods_nums').text();
			//$(this).parent('p').siblings('i>goods_nums').val(parseInt(this_nums)-1);
			$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'sub'},function(data){
					location.reload();
			});
		}
	});
});

</script>
</html>