<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>商品详情</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<!--焦点图切换-->
<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.flexslider-min.js"></script>

</head>
<body>

<div class="block_home_slider">
    <div id="home_slider" class="flexslider">
        
    <div class="flex-viewport" style="overflow: hidden; position: relative;">
    <ul class="slides" style="width: 1000%; margin-left: -5760px;">
    
        <li class="clone" style="width: 1920px; float: left; display: block;">
            <div class="slide">                                            
            <a href="#"><img src="<?php echo ($info["spic"]); ?>" alt=""></a>                
            </div>
         </li>
            
        <li class="" style="width: 1920px; float: left; display: block;">
            <div class="slide">                                            
            <a href="#"><img src="<?php echo ($info["spic2"]); ?>" alt=""></a>            </div>
        </li>
        
        <li class="" style="width: 1920px; float: left; display: block;">
            <div class="slide">                                            
            <a href="#"><img src="<?php echo ($info["spic3"]); ?>" alt=""></a>             </div>
        </li>								
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

<!--TAB切换-->
<script type="text/javascript" src="__PUBLIC__/js/tab.js"></script>
<div class="nTab3">
    <!-- 标题开始 -->
    <div class="TabTitle">
      <ul id="myTab1">
        <li class="active" onclick="nTabs(this,0);">商品信息</li>
        <li class="normal" onclick="nTabs(this,1);">商品参数</li>
      </ul>
    </div>
    <!-- 内容开始 -->
    <div class="TabContent">
      <div id="myTab1_Content0"> 
	
        <p><?php echo ($info["name"]); ?></p>
        <p><s class="font_gray">原价：￥<?php echo ($info["market_price"]); ?></s></p>
        <p>现价：￥<?php echo ($info["price"]); ?></p>
            
        </div>

      <div id="myTab1_Content1" class="none"> 
        <p><?php echo ((strip_tags(stripcslashes(htmlspecialchars_decode($info["content"]))))?(strip_tags(stripcslashes(htmlspecialchars_decode($info["content"])))):'暂无相关参数'); ?></p>
      </div> 
    </div>
</div>

<div class="space60"></div>

<div id="bottomNav">
	<div class="add_cart">

		<?php if(($user_info['role_id']) == "1"): ?><div class="but" style="margin-left: 20%">
			 
			<?php if(($shop['shop_status']) == "1"): ?><input class="btn-cart" type="button" value="加入购物车"/>
			<?php else: ?>
		 	<input class="btn-cart" type="button" value="休息中" disabled="disabled"/><?php endif; ?>
		 </div>
		 
		 <div class="total" style="margin-left: 10%" onclick='location.href="<?php echo U('cart');?>"' >
		 	<img src="__PUBLIC__/images/product_show_r6_c5.png" />
			<em class="cart-count"><?php echo ($cart_count); ?></em>
		 </div><?php endif; ?>
	
	</div>

</div>
</body>
<script>
$(function(){
	$(".btn-cart").click(function(){
		var goods_id="<?php echo ($info["id"]); ?>";
		var goods_price="<?php echo ($info["price"]); ?>";
		var goods_nums=$("#sy_num_gid1").val();
		var post_data={};
		post_data.goods_id=goods_id;
		post_data.goods_price=goods_price;
		post_data.goods_nums=1;
		$.post("<?php echo U('Ajax/addcart');?>",post_data,function(data){
			//alert('添加购物车成功！');
			$(".cart-count").text(data);	
		});
	});
});
</script>
</html>