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
<SCRIPT src="__PUBLIC__/js/alert.js" type="text/javascript"></SCRIPT>
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
			}); 

		$(".sy_plus").click (function () 
			{ 
			var me = $ (this), txt = me.prev (":text"), pc = me.closest("p"); 
			var val = parseFloat (txt.val ()); 
			txt.val (val + 1); 
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
	<ul>		
		<li><b>姓名：</b> <p><input name="consignee" type="text" placeholder="请输入收货人姓名" value='<?php echo ($user_info["name"]); ?>'/></p></li>
		<li><b>地址：</b> <p><input name="address" type="text" placeholder="请输入收货地址" value='<?php echo ($user_info["shipping_address"]); ?>'/></p></li>
		<li><b>手机号</b> <p><input name="mobile" type="text" placeholder="请输入手机号" value="<?php echo ($user_info["mobile"]); ?>"/></p></li>
	</ul>
</div>

<div class="white_bg">

	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="cart_list">
		<dt style="width:30%;">
		<a href="<?php echo U('Index/product_show',array('id'=>$item['goods_id']));?>"><img src="<?php echo ($item["spic"]); ?>" border="0" /></a> </dt>
		<dd>
		<b>
			<a href="<?php echo U('Index/product_show',array('id'=>$item['goods_id']));?>"><?php echo ($item["name"]); ?></a>
			<em><a class="del_one" href="javascript:" goods_id="<?php echo ($item["goods_id"]); ?>"><img src="__PUBLIC__/images/del.png" border="0" /></a></em>
		</b>
		<b>￥<?php echo ($item["trade_price"]); ?></b>
		<b>
			<p class="p_num"> 
			<span class="sy_minus num_sub" id="sy_minus_gid1" goods_id="<?php echo ($item["goods_id"]); ?>">-</span>  
			<input class="sy_num" id="sy_num_gid1" readonly="readonly" type="text" name="number1" value="<?php echo ($item["goods_nums"]); ?>" />  
			<span class="sy_plus num_add" id="sy_plus_gid1" goods_id="<?php echo ($item["goods_id"]); ?>">+</span> 
			</p>
			<p>x <?php echo ($item["package_num"]); ?></p>

			<i>合计：￥<?php echo $item['goods_nums']*$item['trade_price']*$item['package_num'];?></i>
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
		<textarea name="remark" placeholder="备注信息！"></textarea>
		</li>
	</ul>

	<h2 style="color:red;">运费：￥0.00  <span class="font_red" style="color:red;">合计：￥<?php echo ($total_fee); ?></span></h2>

	<input type="hidden" id="shop_min_amount" value="<?php echo ($webinfo["shop_min_amount"]); ?>"/>
	<input type="hidden" id="hidden_total_fee" value="<?php echo ($total_fee); ?>"/>
</div>


<div class="confirm_btns">
	<ul>
		<li style="float:right;"><input name="" type="button" value="提交订单" class="b2 btn-self" order_style="1"/></li>
	</ul>
</div>


<div id="myself_buy" style="display:none">
	<div class="myself_buy">
		<ul>
			<li class="font_gray">请选择支付方式</li>
			<li class="font_red"><a>微信支付</a></li>
		</ul>
	</div>
</div>
</body>
<style>
.on{color:#090}
</style>
<script>
var test_user = "<?php echo ($test_user); ?>";
//del one goods
$('.del_one').click(function(){
		var goods_id = $(this).attr('goods_id');

		$.post("<?php echo U('Ajax/delcart');?>",{'goods_id':goods_id},function(data){	
			if(data==1){
			location.reload();
			}																					
			});
		});
$(".btn-self").click(function(){


		var total_fee = parseFloat($('#hidden_total_fee').val());
		var shop_min_amount = parseFloat($('#shop_min_amount').val());

		if(total_fee < shop_min_amount)
		{
			if(test_user == '0')
			{
				alert('亲，不满'+shop_min_amount+'元，无法结算哦！');
				return false;
			}
		}


		var post_data={};
		post_data.address=$("input[name='address']").val();		//寝室号
		post_data.mobile=$("input[name='mobile']").val();
		post_data.consignee=$("input[name='consignee']").val();
		post_data.order_message = $('textarea').val();
		post_data.order_style=$(this).attr('order_style');				//自己支付
		//alert(post_data.order_style);
		//return false;
		if(post_data.address==''){
			alert('请填写收货地址');
			$("input[name='address']").focus();
			return false;
		}
		if(post_data.mobile==''){
			alert('请填写手机号');
			$("input[name='mobile']").focus();
			return false;
		}
		$.post("<?php echo U('Ajax/order');?>",post_data,function(json){
				//alert(json.error_msg);
				if(json.order_style==1){
				//alert(json.order_id);
				location.href="./wxpay/do/index.php?order_id="+json.order_id;			//跳转到微信支付页面
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
			goods_number = parseInt($('#sy_num_gid1').val());
			if(goods_number < 0)
			{
			//alert(goods_number);
			return false;
			}

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