<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($page_title); ?>-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body{ background:#E1E1E1;}
</style>
<!--弹出层2-->
<LINK href="__PUBLIC__/css/dialog.css" type="text/css" rel="stylesheet">
<SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/dialog.js" type="text/javascript"></SCRIPT>
<SCRIPT src="__PUBLIC__/js/alert.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/jquery.lazyload.min.js" type=text/javascript></SCRIPT>
<!--[if lte IE 8]>
<SCRIPT src="__PUBLIC__/js/html5.js" type=text/javascript></SCRIPT>
<![endif]-->

<SCRIPT src="__PUBLIC__/js/work.js" type=text/javascript></SCRIPT>
<SCRIPT src="__PUBLIC__/js/feiru.js" type=text/javascript></SCRIPT>
</head>
<body>
<div class="navbg" style="margin-top: -18px">
<!--头部-->
﻿<div style="margin-top:-18px;" class="header">
	<h1><a href="<?php echo U('location_building',array('sch_id'=>$position.build_id));?>">切换楼栋</a></h1>
	<h2><?php echo ($position["school"]); ?>-<?php echo ($position["build"]); ?></h2>
</div>
<!--/头部-->

<div class="space50"></div>

<div style="margin-top:-20px;text-align:center;position:fixed;" class="notice">
	<ul>
		<?php if($shop['shop_status'] == 1): ?><li><marquee direction=left scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();" width="70%"><?php echo ($webinfo["shop_notice"]); ?></marquee></li>
	    	<li class='s'><?php echo ($webinfo["open_time"]); ?></li>
        <?php else: ?>
        	<li style="color:#F00"><?php echo ($webinfo["close_desc"]); ?></li>
            <li style="color:#F00"><?php echo ($webinfo["open_time"]); ?></li><?php endif; ?>
	</ul>
</div>


	<div class="index_tab0">
		<ul>			
        <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li><a href="#a<?php echo ($item["id"]); ?>"><?php echo ($item["name"]); ?><a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>


<div class="space50" style="background:#FFF;margin-bottom:10px;"></div>

<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><a name="a<?php echo ($cat["id"]); ?>" id="a<?php echo ($cat["id"]); ?>"></a>
<div class="coin_title2">
	<b><?php echo ($cat["name"]); ?></b>
</div>

	<?php if(is_array($cat[goods_list])): $i = 0; $__LIST__ = $cat[goods_list];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="goods_list">
		<dt>
			<a href="<?php echo U('product_show',array('id'=>$item['id']));?>">
			<img class="lazy" data-original="<?php echo ($item["spic"]); ?>" src="" border="0" />
			</a> </dt>
		<dd>
		<b><a href="<?php echo U('product_show',array('id'=>$item['id']));?>"><?php echo ($item["name"]); ?></a></b>
		<b style="color:#9F9F9F">已售：<?php echo (($item["sale_num"])?($item["sale_num"]):0); ?></b>
		<b>
			<?php if(($shop['shop_status']) == "1"): if(($user_info['role_id']) == "1"): if(($item['store_num']) == "0"): ?><span style="color:#888;">卖完了</span>						
					<?php else: ?>
						<span style="padding-right:30px;"><img class="btn-cart" id="add_cart_<?php echo ($item["id"]); ?>" src="__PUBLIC__/images/product_r8_c11.png" goods_id="<?php echo ($item["id"]); ?>" goods_price="<?php echo ($item["price"]); ?>" store_num="<?php echo ($item["store_num"]); ?>" /></span><?php endif; endif; ?>
			<?php else: ?>
			<span style="color:#888;">休息中</span><?php endif; ?>
			<i class="font_red">￥<?php echo ($item["price"]); ?></i> <s>￥<?php echo ($item["market_price"]); ?></s> <i style="margin-left:10px;"><a id="collection_<?php echo ($item["id"]); ?>" class="btn-collect" goods_id="<?php echo ($item["id"]); ?>" active="0"><?php echo (($item["collect"])?($item["collect"]):0); ?></a></i> 
		</b>  
		</dd>
	</dl><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
<div style="height: 60px"></div>
<div id="bottomNav">
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
<script type="text/javascript">
	$(function() {
    $("img.lazy").lazyload();
});
</script>
</body>
<script>
$(function(){
	
	//收藏
	$(".btn-collect").click(function(){
		var goods_id=$(this).attr('goods_id');
		var goods_num = parseInt($('#collection_'+goods_id).html());
		//$(this).addClass("act");

		$.post("<?php echo U('Ajax/goods_collect');?>",{'goods_id':goods_id},function(data){
			if(data==1){
				goods_num += 1;
				$('#collection_'+goods_id).addClass('act');
				$('#collection_'+goods_id).html(goods_num);
				$('#collection_'+goods_id).attr('active',1);
			}else{
				var active = parseInt($('#collection_'+goods_id).attr('active'));
				if(active == 0)
				{
					alert('您已经收藏过了！');
					return false;
				}
				goods_num -= 1;
				$('#collection_'+goods_id).removeClass('act');
				$('#collection_'+goods_id).html(goods_num);

				$.post("<?php echo U('Ajax/del_goods_collect');?>",{'goods_id':goods_id},function(data){
					if(data==1){
						$('#collection_'+goods_id).attr('active',0);
					}else{	
					}
				});


				//alert('您已经收藏过了！');
				//alert($(this).html());
			}
		});
	});

	//加入购物
	$(".btn-cart").click(function(){

		$('.fly_elm').hide();
		
		var store_num=$(this).attr('store_num');
		var goods_id=$(this).attr('goods_id');
		var goods_price=$(this).attr('goods_price');
		var post_data={};
		post_data.goods_nums=1;
		post_data.goods_id=goods_id;
		post_data.goods_price=goods_price;
		if(parseInt(store_num)<=0){
			alert('该商品库存不足');
			return false;	
		}
		$.post("<?php echo U('Ajax/addcart');?>",post_data,function(data){
			//alert(data);
			if(data==0)
			{
				alert('该商品库存不足');
				return false;	
			}
			//alert('添加购物车成功！');
			feiru(goods_id);
			$(".cart-count").text(data);	
		});
	});

	var fly_elm = '';
	function feiru(goods_id)
	{	
		obj = $('#add_cart_'+goods_id)
		var flyElm = obj.clone().css('opacity','0.7');
		flyElm.css({
			'z-index': 100,
			'display': 'block',
			'position': 'absolute',
			'top': $(obj).offset().top +'px',
			'left': $(obj).offset().left +'px',
			'width': $(obj).width() +'px',
			'height': $(obj).height() +'px'
		});
		$('body').append(flyElm);
		flyElm.animate({
			top:$('.cart-count').offset().top,
			left:$('.cart-count').offset().left,
			width:40,
			height:40,
		},'slow','swing',hide_fly_elm);

		$(flyElm).addClass('fly_elm');
		fly_elm = flyElm;

	}

	function hide_fly_elm()
	{
		$('.fly_elm').hide();
	}
});

//导航滑动固顶

$(function(){
    var subNav_active = $(".act");
    var subNav_scroll = function(target){
        subNav_active.removeClass	("act");
        target.parent().addClass("act");
        subNav_active = target.parent();
    };
    $(".index_tab0 a").click(function(){
        subNav_scroll($(this));
        var target = $(this).attr("href");
        var targetScroll = $(target).offset().top - 120;
        $("html,body").animate({scrollTop:targetScroll},300);
        return false;
    });
})



</script>
</html>