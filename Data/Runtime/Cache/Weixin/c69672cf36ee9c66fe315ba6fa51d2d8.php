<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<!--弹出层-->
<link href="__PUBLIC__/css/qikoo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/zepto.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/qikoo.js?rand=1"></script>
<script type="text/javascript" src="__PUBLIC__/js/alert.js"></script>
</head>
<body class="location_bg">

<div style="margin-top:-18px;" class="header">
    <div class="nav_l">
        <a href="<?php echo U('location_school',array('city_id'=>$sch_info['city_id']));?>"></a>
    </div>
    <div class="nav_r">
		<a href="<?php echo U('location_school',array('city_id'=>$sch_info['city_id']));?>"">切换学校</a>
	</div>
</div>

<div class="space50"></div>

<!--TAB切换-->
<script type="text/javascript" src="__PUBLIC__/js/tab.js"></script>
<div class="nTab">
    <!-- 标题开始 -->
    <!--<div class="TabTitle">
      <ul id="myTab1">
        <li class="active" onclick="nTabs(this,0);">南栋</li>
        <li class="normal" onclick="nTabs(this,1);">北栋</li>
      </ul>
    </div>-->
    
    
    <!-- 内容开始 -->
    <div class="TabContent"  style="width:100%">
    
    
      <div id="myTab1_Content0"> 
	
        <div class="building_list">
            <ul>
            <?php if(is_array($build_list)): $i = 0; $__LIST__ = $build_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li style="color:#6F5F52;"  build_id="<?php echo ($item["id"]); ?>" <?php if($item['shop']['status'] == 1): if(($item['shop']['shop_status']) == "1"): ?>class="btn-sub"<?php else: ?>class="tip-sleep"<?php endif; else: ?>class="tip-close"<?php endif; ?> >
                <span>
                <?php if(empty($item['shop'])): ?><font color="red">申请店长</font>
				<!--&nbsp;<a href="javascript:" style="color:#F00"><small>申请店长</samll></a>-->
                <?php else: ?>
                	<!--1开通状态-->
                	<?php if($item['shop']['status'] == 1): if($item['shop']['shop_status'] == '1'): ?><font color="green">营业中</font>
                        <?php else: ?>
                            	休息中<?php endif; ?>
                    <?php else: ?>
                        <!--"<?php echo U('Ucenter/apply_shopkeeper1');?>"-->
						<font color="red">申请店长</font>&nbsp;
                        <!--<a onclick="qikoo.dialog.confirm('店铺暂未开通,是否申请店长？');" style="color:#F00"><small>申请店长</samll></a>--><?php endif; endif; ?>
                </span><?php echo ($item["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php if(empty($build_list)): ?><p><center>暂无楼栋信息</cenetr></p><?php endif; ?>
        </div>
        
      </div>
    
    </div>
</div>

</body>
<script>
$(function(){
	//定位宿舍楼
	$(".btn-sub").click(function(){
		var build_id=$(this).attr('build_id');
		$.post("<?php echo U('Ajax/fix_position');?>",{'build_id':build_id},function(data){
			location.href="<?php echo U('product_list');?>";	
		});
	});
	$(".tip-sleep").click(function(){
		var build_id=$(this).attr('build_id');
		$.post("<?php echo U('Ajax/fix_position');?>",{'build_id':build_id},function(data){
			location.href="<?php echo U('product_list');?>";	
		});
		//alert('店长休息中!');
	});
	$(".tip-close").click(function(){
		var build_id=$(this).attr('build_id');
		$.post("<?php echo U('Ajax/fix_position');?>",{'build_id':build_id},function(data){
			location.href="<?php echo U('Ucenter/apply_shopkeeper1');?>";
		});
		//alert('fdsfd');
		//location.href="<?php echo U('Ucenter/apply_shopkeeper1');?>";
	});
});
</script>
</html>