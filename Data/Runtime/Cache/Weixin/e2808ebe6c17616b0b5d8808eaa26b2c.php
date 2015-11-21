<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>购物车</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
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
</head>
<body>


<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="cart_list">
	<dt class="pic">
		<a href="<?php echo U('product_show',array('id'=>$item['goods_id']));?>">
        <img src="<?php echo ($item["spic"]); ?>" border="0" /></a> </dt>
	<dd>
	  <b>
		  <a href="<?php echo U('product_show',array('id'=>$item['goods_id']));?>"><?php echo ($item["name"]); ?></a>
		  <em><a class="del_one" href="javascript:" goods_id="<?php echo ($item["goods_id"]); ?>"><img src="__PUBLIC__/images/del.png" border="0" /></a></em>
	  </b>
	  <b>
		  <p class="p_num"> 
			 <span class="sy_minus num_sub" id="sy_minus_gid1" goods_id="<?php echo ($item["goods_id"]); ?>">-</span>  
			 <input class="sy_num" id="sy_num_gid1" readonly="readonly" type="text" value="<?php echo ($item["goods_nums"]); ?>" />  
			 <span onclick="addNum(this)" class="sy_plus num_add" id="sy_plus_gid1" goods_id="<?php echo ($item["goods_id"]); ?>">+</span>
			 </p>
			 <i>
				 合计：￥<?php echo ($item["goods_price"]); ?> <font color=''>x</font> 
             <span class="goods_nums"><?php echo ($item["goods_nums"]); ?></span>&nbsp;&nbsp;
             </i>
	  </b>
	</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>
<div style="height: 90px "></div>
<div id="bottomNav">
	<dl class="balance_bar">
		<dt>
			<p class="font_red">总额：￥<span id="total_fee"><?php echo ($total_fee); ?></span></p>
			<p class="font_gray f12">满<?php echo ($webinfo["user_min_amount"]); ?>元起送</p>
			<input type="hidden" id="user_min_amount" value="<?php echo ($webinfo["user_min_amount"]); ?>"/>
		</dt>
		<dd>
			<input type="hidden" value="<?php echo ($shop["shop_status"]); ?>" id="shop_status"/>
			<a href="javascript:checkout()">去结算</a>
		</dd>
	</dl>

<!--底部导航-->
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

<!--底部导航-->
</div>
</body>
<script>
//del one goods
$('.del_one').click(function(){
	var goods_id = $(this).attr('goods_id');

	$.post("<?php echo U('Ajax/delcart');?>",{'goods_id':goods_id},function(data){	
		if(data==1){
			location.reload();
		}																					
	});
});
//del goods
function delgoods()
{
	var goods_ids = '';
	$('.chk input').each(function(){
		if($(this).attr("checked") == true)
		{
			goods_ids += $(this).val()+',';
		}
	});
		
	if(!goods_ids)
	{
		alert('请选择要删除的商品！');
	}
	$.post("<?php echo U('Ajax/delcart');?>",{'goods_id':goods_ids},function(data){	
		if(data==1){
			location.reload();
		}																					
	});
	//alert(goods_ids);
}
function checkout()
{
	var user_id = '<?php echo ($user_info["id"]); ?>';
	var shop_status = $('#shop_status').val();
	if(shop_status == '0')
	{
		alert('亲，店长休息中！');
		return false;
	}
	var total_fee = parseFloat($('#total_fee').html());
	var user_min_amount = parseFloat($('#user_min_amount').val());
	if(total_fee < user_min_amount)
	{
		alert('亲，不满'+user_min_amount+'元，无法结算哦！');
		return false;
	}
	location.href="<?php echo U('cart2');?>";
}

// 增加数量
function addNum(obj) {
	var goods_id=$(obj).attr('goods_id');
		if(parseInt(goods_id)>0){
			$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'add'},function(data){
				
				if(data==0)
				{
					var anum = parseInt($('#sy_num_gid1').val()) - 1;
					//alert(anum);
					$('#sy_num_gid1').val(anum);
					alert('该商品库存不足');
					return false;	
				}
				if(data==1){location.reload();}																				
			});
		}
}


$(function(){
	/* $(".cart_list").on('click','.num_add',function(){
		var goods_id=$(this).attr('goods_id');
		if(parseInt(goods_id)>0){
			$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'add'},function(data){
				
				if(data==0)
				{
					var anum = parseInt($('#sy_num_gid1').val()) - 1;
					//alert(anum);
					$('#sy_num_gid1').val(anum);
					alert('该商品库存不足');
					return false;	
				}
				if(data==1){location.reload();}																				
			});
		}
		
	}); */
	
	$(".cart_list").on('click','.num_sub',function(){
		var goods_id=$(this).attr('goods_id');
		if(parseInt(goods_id)>0){
			//var this_nums=$(this).parent('p').siblings('i>goods_nums').text();
			//$(this).parent('p').siblings('i>goods_nums').val(parseInt(this_nums)-1);
			$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'sub'},function(data){
				if(data==1){
					location.reload();
				}																						
			});
		}
	});
	
	//删除购物车
	$(".goods_del").on('click',function(){
		var goods_id=$(this).attr('goods_id');

		$.post("<?php echo U('Ajax/delcart');?>",{'goods_id':goods_id},function(data){
			if(data==1){
				location.reload();
			}																					
		});
	});
});
</script>
</html>