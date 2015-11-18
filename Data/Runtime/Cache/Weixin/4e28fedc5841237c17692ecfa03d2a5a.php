<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>喜欢-<?php echo ($webinfo["web_name"]); ?></title>
    <link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        body{ background:#E1E1E1;}
    </style>
    <LINK href="__PUBLIC__/css/dialog.css" type="text/css" rel="stylesheet">
    <SCRIPT src="__PUBLIC__/js/jquery.min.js" type=text/javascript></SCRIPT>
    <SCRIPT src="__PUBLIC__/js/dialog.js" type="text/javascript"></SCRIPT>
    <SCRIPT src="__PUBLIC__/js/alert.js" type=text/javascript></SCRIPT>

</head>
<body>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="goods_list" >
        <dt>
            <a href="<?php echo U('Index/product_show',array('id'=>$item['goods_id']));?>">
                <img src="<?php echo ($item["spic"]); ?>" border="0" /></a> </dt>
        <dd>
            <b style="padding-right: 2em;"><a href="<?php echo U('Index/product_show',array('id'=>$item['goods_id']));?>"><?php echo ($item["name"]); ?></a></b>
            <b style="color: #999">已售：<?php echo ($item["sale_num"]); ?></b>
            <b>
                <span style="padding-right:30px;"><em>
						<a style="margin-bottom:15px;" class="del_one" href="javascript:" goods_id="<?php echo ($item["goods_id"]); ?>"><img src="__PUBLIC__/images/del.png" style="margin-top: 15px" border="0" /></a>
						<img class="btn-cart" id="add_cart_<?php echo ($item["id"]); ?>" src="__PUBLIC__/images/product_r8_c11.png" goods_id="<?php echo ($item["goods_id"]); ?>" goods_price="<?php echo ($item["price"]); ?>" store_num="<?php echo ($item["store_num"]); ?>" />
				</em></span>
                <i class="font_red">￥<?php echo ($item["price"]); ?></i>
                <s>￥<?php echo ($item["market_price"]); ?></s>
                <i><a class="act"><?php echo ($item["collect_num"]); ?></a></i>
            </b>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(empty($list)): ?><p><center>暂无任何数据</center></p><?php endif; ?>

<?php if(strlen($page) > 1): ?><p id="page"><?php echo ($page); ?></p><?php endif; ?>

<script type="text/javascript">

	//删除收藏
	$(".del_one").click(function(){
		var goods_id=$(this).attr('goods_id');
		$(this).removeClass('act');
		$.post("<?php echo U('Ajax/del_goods_collect');?>",{'goods_id':goods_id},function(data){
			if(data==1){
				window.location.reload();
			}else{
				alert(data);
			}
		});
	});

	//加入购物
	$(".btn-cart").click(function(){
		
		var store_num=$(this).attr('store_num');
		var goods_id=$(this).attr('goods_id');
		var goods_price=$(this).attr('goods_price');
		var post_data={};
		post_data.goods_nums=1;
		post_data.goods_id=goods_id;
		post_data.goods_price=goods_price;
		if(parseInt(store_num)<=0){	
		}
		$.post("<?php echo U('Ajax/addcart');?>",post_data,function(data){
			if(data == 0)
			{
				alert('该商品库存不足');
				return false;
			}
			else
			{
				alert('添加购物车成功！');
			}
			//feiru(goods_id);
			//$(".cart-count").text(data);	
		});
	});
</script>
</body>
</html>