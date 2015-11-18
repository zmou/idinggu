<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>叮咕商城-店长管理中心</title>
  <link rel="shortcut icon" href="./favicon.ico"  type="image/x-icon" />
  <link rel="stylesheet" href="__PUBLIC__/Css/reset.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="__PUBLIC__/Css/style.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="__PUBLIC__/Css/invalid.css" type="text/css" media="screen" /> 
  <!--字体图标-->
  <link rel="stylesheet" href="__PUBLIC__/fonts/font-awesome.min.css" type="text/css"/>  
  <!--/字体图标-->
  
	<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.8.3.min.js"></script>
  
  <script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.js"></script>
  <script type="text/javascript" src="__PUBLIC__/Js/simpla.jquery.configuration.js"></script>
  <script type="text/javascript" src="__PUBLIC__/Js/facebox.js"></script>
  <script type="text/javascript" src="__PUBLIC__/Js/jquery.wysiwyg.js"></script>
  <!--公共js-->
  <script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
  <!--公共js-->
  <!--artdialog-->
  <script type="text/javascript" src="__PUBLIC__/Js/artDialog/artDialog.js?skin=green"></script>
  <!--artdialog-->

</head>
  <body>
  <!--topbar-->
  <div class='topbar'>
      <h2 class='align-left'><a href="<?php echo U('Index/index');?>" style="color:#FFF;font-size:20px">店长管理中心</a></h2>
      <div  class='align-right' style="margin-right:20px;">
      	<i id='user-curr' class="fa fa-user" style="font-size:30px;color:#FFF;cursor:pointer"></i>
      </div>
      <div class="clear"></div>
      <div  class='align-right user-info'>
      	<ul>
        <li><b>账户名：<?php echo $resaler_info['username'];?></b>【店长】</li>
        <li><i class="fa fa-power-off v-middle" style="font-size:20px;"></i>
        &nbsp;&nbsp;<a href="<?php echo U('Login/logout');?>" style="color:#666;font-weight:700">安全退出</a>
        </li>
        </ul>
      </div>
      <div class="clear"></div>
  </div>
  <!--topbar-->
  
  <div id="body-wrapper">
    <div id="sidebar">
	<div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
      <h1 id="sidebar-title"><a href="#">奥克斯</a></h1>
      <!-- Logo (221px wide) -->
     <!-- <a href="<?php echo U('Index/index');?>"><center><img id="logo" src="__PUBLIC__/Images/logo.jpg"/></center></a>-->
      <!-- Sidebar Profile links -->
      <div id="profile-links">
        <br />
        <br />
        <a href="<?php echo U('Index/index');?>" title="管理中心">管理中心</a> |
         <a href="<?php echo U('Login/logout');?>" title="退 出">退 出</a>
      </div>
     
      <ul id="main-nav">  
      <!-- Accordion Menu -->
		<li>
			<a href="#" class="nav-top-item">
			基本信息管理
			</a>
			<ul class="dlink">
				<li><a href="<?php echo U('User/pwd');?>">修改密码</a></li>
				<li><a href="<?php echo U('User/shop');?>">店铺信息</a></li>
                <li><a href="<?php echo U('User/edit');?>">店长个人信息</a></li>
			</ul>
		</li>		
        <li> 
          <a href="#" class="nav-top-item">
          订单管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Order/index');?>">订单列表</a></li>
          </ul>
        </li>      
        <li>
          <a href="#" class="nav-top-item">
             店铺商品管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Shopgoods/index');?>">商品列表</a></li>
            <li><a href="<?php echo U('Mall/index');?>">我要进货</a></li>
          </ul>
        </li>

      </ul> <!-- End #main-nav -->
      
    </div>
<script type="text/javascript">
$(document).ready(function() {
	var url=window.location.search;
	$('#main-nav li ul li a').each(function(){
		var aurl='?'+$(this).attr("href").split("?")[1];

		var pul=$(this).parent().parent().prev();
		var tul=$(this).parent().parent().parent();
		if(aurl.indexOf(url)>=0){
			$(this).addClass("current").siblings("a").removeClass("current");
			$(".nav-top-item").removeClass("current");
			pul.addClass("current");
			$(".dlink").css("display","none");
			$(this).parent().parent().css("display","block");
			
		}
	});
});
</script> 

</div> <!-- End #sidebar --> <!-- 左侧列表 -->
    <div id="main-content">
          
      <ul class="shortcut-buttons-set" style="display:none">
        <li><a class="shortcut-button" href="<?php echo U('Admin/Order/index');?>"><span>
          <img src="__PUBLIC__/Images/icons/order_48.png" alt="icon" /><br />
          订单管理
        </span></a></li>
         <li><a class="shortcut-button" href="<?php echo U('Goods/index');?>"><span>
          <img src="__PUBLIC__/Images/icons/clock_48.png" alt="icon" /><br />
          商品管理
        </span></a></li>
        <li><a class="shortcut-button" href="<?php echo U('Distributor/index');?>"><span>
          <img src="__PUBLIC__/Images/icons/config_48.png" alt="icon" /><br />
          分销配置
        </span></a></li>
      	<li><a class="shortcut-button" href="<?php echo U('WechatText/index');?>"><span>
          <img src="__PUBLIC__/Images/icons/wx_48.png" alt="icon" />
          <!--<i class="fa fa-weixin" style="font-size:48px;color:#0C3"></i> -->
          <br />
          微信回复设置
        </span></a></li>
        <li><a class="shortcut-button" href="<?php echo U('Wxusers/index');?>"><span>
          <img src="__PUBLIC__/Images/icons/wxfans.png" alt="icon" width='48' height='48'/>
          <br />
          微信用户管理
        </span></a></li>
        <li><a class="shortcut-button" href="<?php echo U('CmsArt/artlist');?>"><span>
          <img src="__PUBLIC__/Images/icons/pencil_48.png" alt="icon" /><br />
          文章管理
        </span></a></li>
        <li><a rel="modal" class="shortcut-button" href="<?php echo U('WechatPub/get_wx_ip');?>"><span>
          <img src="__PUBLIC__/Images/icons/ip_red_48.png" alt="icon" /><br />
          获取微信IP
        </span></a></li>
        <li><a rel="modal" class="shortcut-button" href="<?php echo U('Admin/Delcache/index');?>" ><span>
          <img src="__PUBLIC__/Images/icons/clear.png" alt="icon"><br>
          清空缓存
        </span></a></li>
        <li><a rel="modal" class="shortcut-button" href="<?php echo U('Admin/Delcache/del_data');?>" ><span>
          <img src="__PUBLIC__/Images/icons/clear.png" alt="icon"><br>
          清除测试数据
        </span></a></li>
        <div style='clear:both !important'></div>
      </ul>
    
      <div class="clear"></div> 
      <div class="content-box" id="main-box">
        <div class="content-box-header">
          
<h4>订单详情</h4>
 <a href="<?php echo U('index');?>" style="margin:5px 10px;" class="btn align-right">返回列表</a>

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
<div class="tab-content default-tab" id="tab1">
    <form id="form" method="post" action="<?php echo U('edit',array('id'=>$data['id']));?>">
        <fieldset>
             <legend>订单信息</legend>
        <p>
            订单ID：【<?php echo ($data["id"]); ?>】
        </p>
        <p>
            下单用户：【<?php echo ($data['order_user']['nickname']); ?>】&nbsp;
            <a title="查看下单用户" target="_blank" href="<?php echo U('Wxusers/uedit',array('id'=>$data['order_user']['id']));?>">查看</a>
        </p>
        <p>
            订单编号：【<?php echo ($data["order_sn"]); ?>】
        </p>
        <p>
            订单状态：
            <?php if(($data["order_status"]) == "3"): ?><font color="green">已签收【交易完成】</font>
            <?php else: ?>
                <select name="order_status">
                <?php if(($data["order_status"]) == "1"): ?><option value="2" <?php if(($data["order_status"]) == "2"): ?>selected<?php endif; ?> >已发货</option><?php endif; ?>
                <?php if(($data["order_status"]) == "2"): ?><option value="3" <?php if(($data["order_status"]) == "3"): ?>selected<?php endif; ?> >已签收</option><?php endif; ?>
                </select><?php endif; ?>
            
        </p>
        <p>
            商品总价：【<font color="red"><b>&yen; </b><?php echo ($data["total_price"]); ?></font>】
        </p>
        <?php if(($data["discount"]) != "0"): ?><p>优惠折扣：【<b><?php echo ($data["discount"]); ?>折</b>】</p><?php endif; ?>
        <?php if(($data["use_jifen"]) != "0"): ?><p>使用积分：【<b><?php echo ($data["use_jifen"]); ?></b> 积分】</p><?php endif; ?>
        <?php if(($data["coupon_amount"]) != "0"): ?><p>使用代金券：【<b><?php echo ($data["coupon_amount"]); ?></b>】</p><?php endif; ?>
        <p>
            订单金额：【<font color="red"><b>&yen; </b><?php echo ($data["total_fee"]); ?></font>】
        </p>
        
        <p>
            下单时间：【<?php echo (date('Y-m-d H:i:s',$data["order_time"])); ?>】
        </p>
        <p>
            支付状态：【<?php switch($data["pay_status"]): case "0": ?><font style="color:red">未支付</font><?php break;?>
                <?php case "1": ?><font style="color:green;font-weight:700">已支付</font><?php break;?>
                <?php case "2": ?><font style="color:red">申请退款</font><?php break;?>
                <?php case "3": ?><font style="color:green;font-weight:700">退款成功</font><?php break; endswitch;?>】
        </p>
         <p>
            支付方式：【<b style="color:green">
            <?php switch($data["pay_way"]): case "1": ?>微信支付<?php break;?>
            <?php case "2": ?>支付宝<?php break;?>
            <?php case "3": ?>银联支付<?php break; endswitch;?></b>
            】
        </p>
        <?php if(($data["pay_status"]) == "1"): ?><p>
                支付时间：【<?php if(($data["pay_time"]) != "0"): echo (date('Y-m-d H:i:s',$data["pay_time"])); endif; ?>】
            </p><?php endif; ?>
        <p>
          <?php if(($data["order_status"]) != "3"): ?><input type="submit" value="确认<?php if(($data["order_status"]) == "1"): ?>已发货<?php endif; if(($data["order_status"]) == "2"): ?>已签收<?php endif; ?>" class="button"><?php endif; ?>
        </p>
            <legend>商品信息</legend>
        <?php if(is_array($order_goods)): $i = 0; $__LIST__ = $order_goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><hr/>
            <p>
                商品名称：【<?php echo ($item["goods_name"]); ?>】| 单价：【<?php echo ($item["goods_price"]); ?>】| 数量：【<?php echo ($item["goods_nums"]); ?>】
                <a class="align-right" href="<?php echo U('Goods/edit',array('id'=>$item['goods_id']));?>" target="_blank" title="查看商品">查看</a>
                <span class='clear'></span>
            </p><?php endforeach; endif; else: echo "" ;endif; ?>
            <hr/>
            <legend>收货人信息</legend>
        <p>
            姓名：【<?php echo ($data["consignee"]); ?>】
        </p>
        <p>
            手机：【<?php echo ($data["mobile"]); ?>】
        </p>
        <!--<p>
            座机：【<?php echo ($data["tel"]); ?>】
        </p>-->
        <p>
            地址：【<?php echo ($data["province"]); ?>-<?php echo ($data["city"]); ?>-<?php echo ($data["district"]); ?>-<?php echo ($data["address"]); ?>】
        </p>
<!--         <legend>店铺信息</legend>
        <p>
            店铺名称：【<?php echo ($data["shop_wechatid"]); ?>】
        </p>
        <p>
            会员名：【<?php echo ($data["shop_wechatid"]); ?>】
        </p>-->
      <div class="clear"></div>
      </fieldset>
    </form>
</div>
<!--kindeditor-->
<link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>
<!--kindeditor-->
<script>
	KindEditor.ready(function(K) {
		//初始化编辑器
		var editor1 = K.create('textarea[name="content"]', {
			cssPath : '/plugins/kindeditor/plugins/code/prettify.css',
			uploadJson : '/plugins/kindeditor/php/upload_json.php',
			fileManagerJson : '/plugins/kindeditor/php/file_manager_json.php',
			allowFileManager : true,
			afterCreate : function() {}
		});
		prettyPrint();
	});
	/*$(function() {
		var editor = KindEditor.create('textarea[name="content"]');
	});*/
	//单图上传
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K('#image1').click(function() {
			editor.loadPlugin('image', function() {
				editor.plugin.imageDialog({
					imageUrl : K('#url1').val(),
					clickFn : function(url, title, width, height, border, align) {
						K('#url1').val(url);
						editor.hideDialog();
					}
				});
			});
		});
	});
	//批量上传图片
	KindEditor.ready(function(K) {
		var editor = K.editor({
			allowFileManager : true
		});
		K('#J_selectImage').click(function() {
			editor.loadPlugin('multiimage', function() {
				editor.plugin.multiImageDialog({
					clickFn : function(urlList) {
						var div = K('#J_imageView');
						div.html('');
						K.each(urlList, function(i, data) {
							div.append('<img src="' + data.url + '">');
						});
						editor.hideDialog();
					}
				});
			});
		});
	});
</script>

        </div> <!-- End .content-box-content -->
      </div> <!-- End .content-box -->

      <div class="clear"></div>
      <div id="footer">
         
        <small>
            Copyright  &#169;  2015 叮咕商城 版权所有  | Powered by <a href="#">叮咕商城</a> | <a href="#">Top</a>
        </small>
      
      </div><!-- End #footer -->
    </div> <!-- End #main-content -->
  </div>
</body>
</html>