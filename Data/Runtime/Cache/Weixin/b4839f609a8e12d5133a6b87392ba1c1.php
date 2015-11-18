<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>我要补货</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<SCRIPT src="__PUBLIC__/js/alert.js" type="text/javascript"></SCRIPT>
</head>
<body>
<!--TAB切换-->
<script type="text/javascript" src="__PUBLIC__/js/tab.js"></script>
<div class="nTab2">
	<!-- 标题开始 -->
	<div class="TabTitle">
		<ul id="myTab1">
			<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li <?php if(($item["id"]) == $_GET['cid']): ?>class="active"<?php endif; ?> onclick='location.href="<?php echo U('replenishment',array('cid'=>$item['id']));?>"'>
			<?php echo ($item["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
	<!-- 内容开始 -->
	<div class="TabContent">


		<div id="myTab1_Content0"> 

			<div class="orders">
				<!--<span><a href="#">价格</a> <a href="#">销量</a> </span>-->        
			</div>


			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="cart_list">
				<dt style="width:30%;">
				<a href="<?php echo U('Index/product_show',array('id'=>$item['id']));?>">
					<img src="<?php echo ($item["spic"]); ?>"/></a> 
				</dt>
				<dd>
				<b><a href="<?php echo U('Index/product_show',array('id'=>$item['id']));?>"><?php echo ($item["name"]); ?></a>
				</b>
				<b>￥<?php echo ($item["trade_price"]); ?></b>
				<b>
					<p class="p_num" style="margin-left:5px;"> 
						<span class="sy_minus"><a href="javascript:" class="num_sub" goods_price="<?php echo ($item["trade_price"]); ?>" goods_id="<?php echo ($item["id"]); ?>" package_num="<?php echo ($item["package_num"]); ?>">-</a></span>
						<input class="sy_num" id="goods_number_<?php echo ($item["id"]); ?>" readonly="readonly" type="text" name="number1" value="<?php $goods_id = $item['id'];echo $cart_goods[$goods_id]['goods_nums'] ? $cart_goods[$goods_id]['goods_nums'] : 0;?>" />  
						<span class="sy_plus"><a href="javascript:" class="num_add" goods_id="<?php echo ($item["id"]); ?>" goods_price="<?php echo ($item["trade_price"]); ?>" package_num="<?php echo ($item["package_num"]); ?>">+</a></span>
					</p>
					x <?php echo ($item["package_num"]); ?>
					<i>合计：￥<span id="sub_total_<?php echo ($item["id"]); ?>"><?php echo $item['trade_price']*$cart_goods[$goods_id]['goods_nums']*$item['package_num'];?></span></i>
				</b>
				</dd>
			</dl><?php endforeach; endif; else: echo "" ;endif; ?>

			<?php if(strlen($page) > 1): ?><p id="page"><?php echo ($page); ?></p><?php endif; ?>       

			<?php if(empty($list)): ?><p class="space10"></p>
			<p><center>暂无相关商品</center></p><?php endif; ?>          

		</div>


	</div>
</div>
<div class="space100"></div>
<div id="bottomNav">
	<dl class="balance_bar">
		<dt>
		<p class="font_red">总额：￥<?php echo (($total_fee)?($total_fee):0); ?></p>
		<p class="font_gray f12">满<?php echo ($webinfo["shop_min_amount"]); ?>元起送</p>
		<input type="hidden" id="shop_min_amount" value="<?php echo ($webinfo["shop_min_amount"]); ?>"/>

		</dt>

		<dd>
		<a href="javascript:checkout();">确定补货</a>
		</dd>
		<input type="hidden" value="<?php echo (($total_fee)?($total_fee):0); ?>" id="hidden_total_fee"/>
	</dl>
</div>
<script type="text/javascript">
var test_user = "<?php echo ($test_user); ?>";
function checkout()
{
	var total_fee = parseFloat($('#hidden_total_fee').val());
	var shop_min_amount = parseFloat($('#shop_min_amount').val());

	if(total_fee < shop_min_amount)
	{
		if(test_user == '0')
		{
		//alert(total_fee+','+shop_min_amount);
		alert('亲，不满'+shop_min_amount+'元，无法结算哦！');
		return false;
		}
	}
	//alert(total_fee+','+shop_min_amount);
	location.href="<?php echo U('shop_cart2');?>";
}
$(document).ready(function(){


		var total_fee = parseFloat($('#hidden_total_fee').val());

		$(".num_add").live('click',function(){


			var me = $ (this), txt = me.parent().prev (":text"), pc = me.closest("p"); 
			var val = parseFloat (txt.val ()); 
			txt.val (val + 1); 


			var goods_id=$(this).attr('goods_id');
			var goods_price=parseFloat($(this).attr('goods_price'));
			var goods_number = parseInt($('#goods_number_'+goods_id).val());

			var package_num = parseInt($(this).attr('package_num'));

			//alert(goods_number);
			if(goods_number < 2)
			{
			//alert(goods_id);
			var post_data={};
			post_data.goods_nums=1;
			post_data.goods_id=goods_id;
			post_data.goods_price=goods_price;

			$.post("<?php echo U('Ajax/addcart');?>",post_data,function(data){
					//alert('添加购物车成功！');
					//$(".cart-count").text(data);	

					});

			}else{
				$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'add','package_num':package_num},function(data){

						//alert(total_fee);
						});
			}

		total_fee += goods_price * package_num;

		$('.font_red').html('总额：￥'+total_fee.toFixed(1));
		$('#hidden_total_fee').val(total_fee);
		var sub_total = goods_number * goods_price * package_num;
		$('#sub_total_'+goods_id).html(sub_total.toFixed(1));


		});		

		$(".num_sub").live('click',function(){

				var me = $ (this), txt = me.parent().next (":text"), pc = me.closest("p"); 
				var val = parseFloat(txt.val()); 
				new_val = val;
				val = val < 1 ? 1 : val;
				txt.val (val-1); 

				var goods_id=$(this).attr('goods_id');
				var goods_price=parseFloat($(this).attr('goods_price'));
				var goods_number = parseInt($('#goods_number_'+goods_id).val());

				var package_num = parseInt($(this).attr('package_num'));

				if(new_val)
				{
					total_fee -= goods_price * package_num;
					$('.font_red').html('总额：￥'+total_fee.toFixed(1));
					$('#hidden_total_fee').val(total_fee);
					var sub_total = goods_number * goods_price * package_num;
					$('#sub_total_'+goods_id).html(sub_total.toFixed(1));

					$.post("<?php echo U('Ajax/updatecart');?>",{'goods_id':goods_id,'act':'sub','package_num':package_num},function(data){

						//alert(total_fee);
					});
				}
				else
				{
					//alert(new_val);
				}


		});	
});
</script>
</body>
</html>