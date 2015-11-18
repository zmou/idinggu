<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
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
<div class="header">
	<h1><a href="<?php echo U('location_city');?>">切换楼栋</a></h1>
	<h2><?php echo ($position["school"]); ?>x<?php echo ($position["build"]); ?></h2>
</div>
<!--/头部-->
<div class="space52"></div>
<?php if($shop['shop_status'] != 1): ?><!--<div style="text-align:center">  
  <p style="text-align:center;font-weight:700;color:#F00;background:#FFEFBF">
  <marquee scrollAmount=3 width=200>店长休息中，暂停营业...</marquee>
  </p>	
</div>
-->
<div class="notice">
	<ul>
		<li style="color:#F00">店长休息中...</li>	
		<li style="color:#F00">暂停营业...</li>	
	</ul>
</div><?php endif; ?>

<div class="block_home_slider">
	<div id="home_slider" class="flexslider">

		<div class="flex-viewport" style="overflow: hidden; position: relative;">
			<ul class="slides" style="width: 1000%; margin-left: -5760px;">
				<?php if(is_array($slide)): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><!--
				<li class="clone" style="width: 1920px; float: left; display: block;">
				<div class="slide">                                            
					<a href="#"><img src="images/index_r4_c2.jpg" alt=""></a>                                        </div>
				</li>-->

				<li class="clone" style="width: 1920px; float: left; display: block;">
				<div class="slide">                                            
					<a href="#"><img src="<?php echo ($item["spic"]); ?>" alt=""></a>                
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



<div class="liquid-slider"  id="slider-id">

	<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div>
		<h2 class="title"><?php echo ++$key;?></h2>
		<p>
		<h1><a href="<?php echo U('product_list',array('cid'=>$item['id']));?>"><?php echo ($item['name']); ?></a></h1>
		<div class="tab_pic" onclick='location.href="<?php echo U('product_list',array('cid'=>$item['id']));?>"'>
			<a href="<?php echo U('product_list',array('cid'=>$item['id']));?>"><img src="<?php echo ($item["spic"]); ?>" style="height:200px;"/></a>
		</div>
		</p>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>


</div>
<script>
$(function(){
		$('#slider-id').liquidSlider();
		});
</script>

<div class="space60"></div>

<div id="bottomNav">
	<!--底部导航-->
	<!--<div id="bottomNav">-->
	<div class="footer_menu">
		<ul>
			<li>
            <a href="/"  <?php if((MODULE_NAME == 'Index') AND (ACTION_NAME == 'index')): ?>class="act"<?php endif; ?>>
            <?php if((MODULE_NAME == 'Index') AND (ACTION_NAME == 'index')): ?><img src="__PUBLIC__/images/index_r15_c3.png"/>
            <?php else: ?>
                <img src="__PUBLIC__/images/product_r12_c4.png"/><?php endif; ?>
            <span>首页</span>
            </a>
            </li>
			<li>
            <a href="<?php echo U('Index/cart');?>"  <?php if((MODULE_NAME == 'Index') AND (in_array(ACTION_NAME,array('cart','cart2')))): ?>class="act"<?php endif; ?>>
            
            <?php if((MODULE_NAME == 'Index') AND (in_array(ACTION_NAME,array('cart','cart2')))): ?><img src="__PUBLIC__/images/product_r13_c7.png"/>
            <?php else: ?>
                <img src="__PUBLIC__/images/index_r16_c7.png"/><?php endif; ?>
            <em class="cart-count"><?php echo (($cart_count)?($cart_count):0); ?></em>
            <span>购物车</span>
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