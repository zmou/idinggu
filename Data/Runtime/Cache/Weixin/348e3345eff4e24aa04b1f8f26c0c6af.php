<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>叮咕校园商城</title>
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
</div>
<!--/头部-->
<div class="space50"></div>

<div class="block_home_slider">
        <div id="home_slider" class="flexslider">
            
        <div class="flex-viewport" style="overflow: hidden; position: relative;">
        <ul class="slides" style="width: 1000%; margin-left: -5760px;">
        <?php if(is_array($slide)): $i = 0; $__LIST__ = $slide;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="clone" style="width: 1920px; float: left; display: block;">
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

<div style="text-align:center">  
  <p style="text-align:center;font-weight:700;font-size:18px;color:#F00">店长休息中，暂停营业...</p>
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
			<li><a href="/"><img src="__PUBLIC__/images/product_r12_c4.png"/><span>首页</span></a></li>
			<li><a href="<?php echo U('Index/cart');?>"><img src="__PUBLIC__/images/index_r16_c7.png"/><span>购物车</span></a></li>
			<li><a href="<?php echo U('Ucenter/index');?>" class="act"><img src="__PUBLIC__/images/ucenter_r8_c7.png"/><span>我的</span></a></li>
		</ul>
	</div>
<!--</div>-->
<!--底部导航-->
</div>

</body>
</html>