<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/slick.css" rel="stylesheet" type="text/css" />

<!--焦点图切换-->
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.flexslider-min.js"></script>
<!--TAB左右滑动切换-->
<script src="__PUBLIC__/js/jquery.easing.1.3.js"></script>
<script src="__PUBLIC__/js/jquery.touchSwipe.min.js"></script>
<script src="__PUBLIC__/js/jquery.liquid-slider.min.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
</style>
</head>
<body>
<!--头部-->
﻿<div style="margin-top:-18px;" class="header">
	<h1><a href="<?php echo U('location_city');?>">切换楼栋</a></h1>
	<h2><?php echo ($position["school"]); ?>x<?php echo ($position["build"]); ?></h2>
</div>
<!--/头部-->
<div style=" width:100%; height:27px; margin:0 auto; clear:both;"></div>

<div class="block_home_slider">
	<div id="home_slider" class="flexslider">

		<div class="flex-viewport" style="overflow: hidden; position: relative;">
			<ul class="slides" style="width: 1000%; margin-left: -5760px;">
				<?php if(is_array($slide)): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="clone" style="width: 1920px; float: left; display: block;">
				<div class="slide">                                            
					<a href="<?php echo ($item["url"]); ?>"><img src="<?php echo ($item["spic"]); ?>" alt=""></a>
				</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>					
			</ul>
		</div>
	</div>
</div>

<script type="text/javascript">
$(function () {
		$('#home_slider').flexslider({
animation : 'slide',
controlNav : true,
directionNav : true,
animationLoop : true,
slideshow : true,
useCSS : false
});

		});
</script>



<div style="margin-top: 0px;"  class="slick">

	<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><DIV><a href="<?php echo U('product_list',array('cid'=>$item['id']));?>"> <span><?php echo ($item["name"]); ?></span> <img src="<?php echo ($item["spic"]); ?>"> </a></DIV><?php endforeach; endif; else: echo "" ;endif; ?>

</div>

<!--商品类别切换-->
<SCRIPT src="__PUBLIC__/js/slick.min.js"></SCRIPT>
<script>
$(function(){
		$('.slick').slick({
centerMode: true,
centerPadding: '60px',
slidesToShow: 3,
responsive: [
{
breakpoint: 768,
settings: {
arrows: false,
centerMode: true,
centerPadding: '40px',
slidesToShow: 3
}
},
{
breakpoint: 480,
settings: {
arrows: false,
centerMode: true,
centerPadding: '40px',
slidesToShow: 1
}
}
]
});
})
</script>


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

</body>
</html>