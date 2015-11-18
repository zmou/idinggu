<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>叮咕商城-后台管理中心</title>
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
  <script type="text/javascript" src="__PUBLIC__/Js/datepicker/WdatePicker.js"></script>
  
</head>
  <body>
  <!--topbar-->
  <div class='topbar'>
      <h2 class='align-left'><a href="<?php echo U('Index/index');?>" style="color:#FFF;font-size:20px">叮咕商城-管理中心</a></h2>
      <div  class='align-right' style="margin-right:20px;">
      	<i id='user-curr' class="fa fa-user" style="font-size:30px;color:#FFF;cursor:pointer"></i>
      </div>
      <div class="clear"></div>
      <div  class='align-right user-info'>
      	<ul>
        <li><b><?php echo I('session.username');?></b>
        <?php if(($role_name) != ""): ?>【<?php echo ($role_name); ?>】<?php endif; ?>
        <?php if(($_SESSION['uid']) == "1"): ?>【超级管理员】<?php endif; ?>
        </li>
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
        <!--你好, <a href="<?php echo U('RBAC/editUser',array('id'=>1));?>" title="修改密码"><?php echo I('session.username');?></a>
        , 您有 <a href="#messages" rel="modal" title="3 Messages">3 条未读消息</a>-->
        <br />
        <br />
        <a href="<?php echo U('Weixin/Index/index');?>" title="商城首页" target="_blank">商城首页</a> |
        <a href="<?php echo U('Index/index');?>" title="管理中心">管理中心</a> |
         <a href="<?php echo U('Login/logout');?>" title="退 出">退 出</a>
      </div>
     
      <ul id="main-nav">  
      <!-- Accordion Menu -->
<?php if((I('session.username') == C('RBAC_SUPERADMIN'))): ?><li>
			<a href="#" class="nav-top-item">
			管理中心权限管理
			</a>
			<ul class="dlink">
				<li><a href="<?php echo U('RBAC/index');?>">管理员列表</a></li>
				<li><a href="<?php echo U('RBAC/role');?>">角色列表</a></li>
				<li><a href="<?php echo U('RBAC/node');?>">节点列表</a></li>
				<li><a href="<?php echo U('RBAC/addNode');?>">添加节点</a></li>
			</ul>
		</li><?php endif; ?> 
		<li> 
          <a href="#" class="nav-top-item">
          微信商城管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Goods/index');?>">商品管理</a></li>
            <li><a href="<?php echo U('GoodsCate/index');?>">分类管理</a></li>
            <li><a href="<?php echo U('GoodsBrand/index');?>">品牌管理</a></li>
            <li><a href="<?php echo U('TakeMoney/index');?>">提现申请</a></li>
          </ul>
        </li> 
        <li> 
          <a href="#" class="nav-top-item">
          订单管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Order/index');?>">订单列表</a></li>
            <li><a href="<?php echo U('Order/refund_list');?>">售后申请</a></li>
          </ul>
        </li> 
        <li> 
          <a href="#" class="nav-top-item">
          热门城市管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Hotcity/index');?>">城市列表</a></li>
          </ul>
        </li>
        <li> 
          <a href="#" class="nav-top-item">
          学校管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('School/index');?>">学校列表</a></li>
          </ul>
        </li>

        <!--<li> 
          <a href="#" class="nav-top-item">
          商城导航管理
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Navlink/index');?>">首页导航</a></li>
          </ul>
        </li> 
        <li> 
          <a href="#" class="nav-top-item">
          分销设置
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Conf/resale');?>">佣金分配设置</a></li>
          </ul>
        </li> -->
        <!--<li> 
          <a href="#" class="nav-top-item">
          积分规则
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('Conf/jifen');?>">积分规则设置</a></li>
          </ul>
        </li> -->
        <li> 
          <a href="#" class="nav-top-item">
          咕币商城管理
          </a>
          <ul class="dlink">
          	<li><a href="<?php echo U('Conf/jifen');?>">咕币规则设置</a></li>
            <li><a href="<?php echo U('Jifen/index');?>">商品管理</a></li>
            <li><a href="<?php echo U('Jifen/order_list');?>">订单管理</a></li>
          </ul>
        </li> 
        
       
        <li>
          <a href="#" class="nav-top-item">
            微信管理系统
          </a>
          <ul class="dlink">
            <li><a href="<?php echo U('WechatPub/index');?>">1、公众账号设置</a></li>
            <li><a href="<?php echo U('WechatMenu/index');?>">2、微信菜单设置</a></li>
            <li><a href="<?php echo U('WechatText/index');?>">3、微信回复设置</a></li>
            <!--<li><a href="<?php echo U('Wxusers/fans_analyze');?>">4、粉丝统计分析</a></li>
            <li><a href="<?php echo U('Wxusers/list_wxfans');?>">4、拉取粉丝列表</a></li>-->
          </ul>
        </li>
         <li>
          <a href="#" class="nav-top-item">
            会员管理
          </a>
          <ul class="dlink">
            <!--<li><a href="<?php echo U('WxGroup/index');?>">微信用户分组</a></li>-->
            <li><a href="<?php echo U('Wxusers/index');?>">会员列表</a></li>
            <!--<li><a href="<?php echo U('Wxusers/level');?>">会员等级管理</a></li>-->
          </ul>
        </li>
         <li> 
          <a href="#" class="nav-top-item">
          店长管理
          </a>
          <ul class="dlink"> 
            <li><a href="<?php echo U('Shop/index');?>">店长列表</a></li>
            <li><a href="<?php echo U('Shop/audit');?>">店铺申请</a></li>
            <li><a href="<?php echo U('Shop/shop_order');?>">店长订单</a></li>
          </ul>
        </li> 
           
        <li> 
          <a href="#" class="nav-top-item">
          内容管理系统
          </a>
          <ul class="dlink"> 
            <li><a href="<?php echo U('CmsSort/sortlist');?>">栏目管理</a></li>
            <li><a href="<?php echo U('CmsArt/artlist');?>">文章管理</a></li>
            <li><a href="<?php echo U('Feedback/index');?>">用户反馈</a></li>
          </ul>
        </li>     
		<li>
          <a href="#" class="nav-top-item">
            系统配置
          </a>
          <ul class="dlink">
         	<li><a href="<?php echo U('Conf/index');?>">系统信息设置</a></li>
            <li><a href="<?php echo U('Recharge/index');?>">充值金额配置</a></li>
           	<!--<li><a href="<?php echo U('Conf/msg');?>">短信网关设置</a></li>
            <li><a href="#">短信模板管理</a></li>
            <li><a href="<?php echo U('Conf/email');?>">邮件服务器设置</a></li>-->
            <li><a href="<?php echo U('Log/index');?>">后台登录日志</a></li>
            <li><a href="<?php echo U('FriendLink/index');?>">友情链接管理</a></li>
			<li><a href="<?php echo U('Slide/index');?>">轮播图片管理</a></li>
          </ul>
        </li>
<?php if((I('session.username') == C('RBAC_SUPERADMIN'))): ?><li>
          <a href="#" class="nav-top-item">
            数据备份恢复
          </a>
          <ul class="dlink">
			<li><a href="<?php echo U('Database/index');?>">数据备份</a></li>
          	<li><a href="<?php echo U('Database/recover');?>">数据恢复</a></li>
          </ul>
        </li><?php endif; ?>        
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

</div> <!-- End #sidebar -->
 <!-- 左侧列表 -->
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
          
<h4>添加节点</h4>  
<a class="btn align-right" style="margin:5px 10px;" href="<?php echo U('node');?>">返回</a> 

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
<div class="tab-content default-tab" id="tab1">
            <form method="post" action="<?php echo U('Admin/RBAC/editNodeHandle');?>">
              <fieldset>
                <p>
                    <?php echo ($type); ?>名称：<input required type="text" name="name"  class="text-input small-input" value="<?php echo ($nrs["name"]); ?>"> 
                </p>
                <p>
                    <?php echo ($type); ?>描述：<input type="text" name="title"  class="text-input small-input" value="<?php echo ($nrs["title"]); ?>"> 
                </p>
                <p>
                    是否开启：<input type="radio" name="status" value="1" checked="checked"/>&nbsp;开启&nbsp;
                              <input type="radio" name="status" value="0"/>&nbsp;关闭&nbsp;
                </p>
                <p>
                    <?php echo ($type); ?>排序：<input type="text" name="sort"  class="text-input small-input" value="<?php echo ($nrs["sort"]); ?>"> 
                </p>                
                <p>
                  <input type="hidden" name="id" value="<?php echo ($nrs["id"]); ?>"/>
                  <input type="submit" value="  提 交  " class="button">
                </p>
              </fieldset>
              <div class="clear"></div>
            </form>
</div>

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