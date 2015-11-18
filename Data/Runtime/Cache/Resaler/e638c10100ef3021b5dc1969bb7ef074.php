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
  <script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
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
          
<h4>店铺信息设置</h4>  

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
<div class="tab-content default-tab" id="tab1">
<!--kindeditor-->
<link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>
<!--kindeditor-->

<script language="text/javascript" type="text/javascript" src="/Public/Xcwl/DatePicker/WdatePicker.js"></script>
    <div class="notification <?php if(($shop["shop_status"]) == "1"): ?>success<?php else: ?>error<?php endif; ?> png_bg" id="dmsg">
        <a href="#" class="close">
        <img src="__PUBLIC__/Images/icons/cross_grey_small.png" alt="close" /></a>
        <div>
        	<font style="font-weight:700">店铺营业状态：<?php if(($shop["shop_status"]) == "1"): ?>营业中<?php else: ?>暂停营业<?php endif; ?></font>
        </div>
    </div>	
            <form method="post" action="<?php echo U('shop');?>">
              <fieldset>
                <p>
                     店铺地址：【<?php echo ($shop["prov"]); ?>
                     -<?php echo ($shop["city"]); ?>
                     -<?php echo ($shop["town"]); ?>
                     -<?php echo ($shop["school"]); ?>-<?php echo ($shop["build"]); ?>】
                </p>
               
                <p>
                    营业状态：<select name="shop_status">
                    <option value="1" <?php if(($shop["shop_status"]) == "1"): ?>selected<?php endif; ?>>营业中</option>
                    <option value="0" <?php if(($shop["shop_status"]) == "0"): ?>selected<?php endif; ?>>暂停营业</option>
                    </select>
                </p>
                
                <p>
                  <input type="submit" value="提 交" class="button">
                </p>
              </fieldset>
              <div class="clear"></div>
            </form>
</div>
<script>
	KindEditor.ready(function(K) {
		//初始化编辑器
		var editor1 = K.create('textarea[id="myEditor"]', {
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