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
            <li><a href="<?php echo U('Goods/collection');?>">收藏管理</a></li>
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
            <li><a href="<?php echo U('Hotcity/county');?>">区县排序</a></li>
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
            <li><a href="<?php echo U('Wxusers/feedback');?>">投诉反馈</a></li>
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
          
<h4><?php if(I('get.id') > 0): ?>[修改]<?php else: ?>[新增]<?php endif; ?>回复配置</h4>  
<a style="float:right;margin:5px 10px;" href="<?php echo U('index');?>" class="btn">返回</a> 

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
<div class="tab-content default-tab" id="tab1">
<!--<link href="/plugins/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>	-->
<!--<script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>-->
<form method="post" action="<?php echo U('textaddhandle',array('id'=>I('get.id')));?>">
  <fieldset>
    <p>
        关键字&nbsp;&nbsp;&nbsp;：&nbsp;&nbsp;<input type="text" name="textkey" id="small-input" class="text-input small-input" value="<?php echo ($nrs["textkey"]); ?>"> 
    </p>
    <p>
        触发菜单：
        <select name='menukey'>
            <option value=''>—选择触发该消息的click菜单—</option>
            <option value='subscribe' <?php if(($nrs["menukey"]) == "subscribe"): ?>selected<?php endif; ?>>关注</option>
            <?php if(is_array($menulist)): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value='<?php echo ($val["key"]); ?>' <?php if(($nrs["menukey"]) == $val["key"]): ?>selected<?php endif; ?>><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <span class="input-notification success png_bg">&nbsp;希望某个事件或click类型菜单触发该关键字时选择，不需要时留空即可！</span>
    </p>

    <p>
        回复类型：

        <input type="radio" class="text-radio" name="type" value="0" <?php if($nrs['type'] == 0): ?>checked="checked"<?php endif; ?>/>&nbsp;图文消息(news)&nbsp;
        <input type="radio" name="type" class="text-radio" value="1" <?php if($nrs['type'] == 1): ?>checked="checked"<?php endif; ?> />&nbsp;文字消息(text)&nbsp;
    </p>
    <?php if(($nrs["type"]) == "1"): ?><p>
      回复内容：
        <!--<input type="text" name="conf" id="small-input" class="text-input small-input" value="<?php echo ($nrs["conf"]); ?>" style="width:90% !important"> -->
        <textarea name="conf" required style="height:auto" rows="5" class="text-input small-input"><?php echo ($nrs["conf"]); ?></textarea>
        <!--<span class="input-notification success png_bg">{nickname}会被替换为用户微信昵称，{id}会被替换为用户id</span>-->
    </p><?php endif; ?>
    <p>
      <input type="submit" value="  提 交  " class="button">
    </p>
  </fieldset>
  <div class="clear"></div>
 </form> 
</div>
    
    <form action="<?php echo U('newsaddrep',array('id'=>I('get.id')));?>" method="post" enctype="multipart/form-data">
        <div id='addnews' class="content-box column-left-" <?php if(($nrs["type"]) == "1"): ?>style="display:none"<?php endif; ?>>            
                    <div class="content-box-header">
                        <h4 style="cursor: s-resize;">新增图文</h4>
                    </div>
                    <div class="content-box-content" style="display: block;">
                        <div class="tab-content default-tab" style="display: block;">
                        <p>
                            菜单标题： <input required="" type="text" name="title" id="small-input" class="text-input medium-input" value="<?php echo ($nrs["Title"]); ?>">
                        </p>
                        <p>
                        菜单描述： <input required type="text" name="descrip" id="small-input" class="text-input medium-input" value="<?php echo ($nrs["Description"]); ?>">
                        </p>
<!--                        <p>                    
                            菜单图片：<input  id="pic1" type="file" onchange="document.getElementById('picurl1').value=this.value;" style="display:none;" name="spic[]">
                            <input required="" id="picurl1" class="text-input medium-input" type="text" value="<?php echo ($nrs["PicUrl"]); ?>">&nbsp;
                                    <a class="btn" onclick="document.getElementById('pic1').click();">选择文件</a>
                        </p>-->
                        <p>
                        菜单图片：
                        <input readonly name="picurl" type="text" id="url1" value="<?php echo ($news["conf"]["PicUrl"]); ?>" class="text-input medium-input"/> 
                        <input type="button" id="image1" value="选择图片" class="button"/>
                        <font style="color:red">&nbsp;【图片大小不能超过1M】</font>
                        </p>
                        <p>                                
                            菜单链接： <input  type="text" name="url" id="small-input" class="text-input medium-input" value="<?php echo ($nrs["Url"]); ?>">
                        <select class='selfurl'>
                            <option value=''>—选择系统内部地址—</option>
                            <option value='' disabled="disabled">【系统功能】</option>
                            <?php if(is_array($wx_nav)): $i = 0; $__LIST__ = $wx_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["url"]); ?>"><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            <option disabled="disabled">【系统文章】</option>
 							<?php if(is_array($cmslist)): $i = 0; $__LIST__ = $cmslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>" disabled="disabled"><?php echo ($item["name"]); ?>【栏目】</option>
                                <?php if(is_array($item["artlist"])): $i = 0; $__LIST__ = $item["artlist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo U('Weixin/Cms/read',array('id'=>$val['id']));?>"><?php echo ($val["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        </p>
                    <p>
                      <input type="submit" value="  保 存 图 文  " class="button">
                    </p>
                        </div>
                    </div>
        </div> 
    </form>
    
    
    <div id='newslist' class="content-box column-right-" <?php if(($nrs["type"]) == "1"): ?>style="display:none"<?php endif; ?>>            
                <div class="content-box-header">
                    <h4 style="cursor: s-resize;">图文列表</h4>
                </div>
                <div class="content-box-content" style="display: block;">
                    <div class="tab-content default-tab" style="display: block;">
             <table style='width:100%' border=''>
              <thead>
                <tr>
                   <th  width='5%'>ID</th> 
                   <th  width='15%'>图文标题</th>
                   <th  width='20%'>图文描述</th>
                   <th  width='20%'>图文图片</th>
                   <th  width='20%'>图文链接</th>
                   <th  width='20%'>操作</th>
                </tr>
              </thead>

              <tbody>
                <?php if(is_array($nrs["conf"])): $k = 0; $__LIST__ = $nrs["conf"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr>
                      <td><?php echo ($k); ?></td>  
                      <td><a href="#" title="title"><?php echo ($v["Title"]); ?></a></td>
                      <td><?php echo ($v["Description"]); ?></td>
                      <td><?php echo ($v["PicUrl"]); ?></td>
                      <td><?php echo ($v["Url"]); ?></td>
                      <td>
                        <a class="btn btn-success" href="<?php echo U('newsEdit',array('id'=>I('get.id'),'tid'=>$k));?>" title="Edit">编辑</a>
                         <a class="btn btn-danger" href="<?php echo U('newsdelrep',array('id'=>I('get.id'),'tid'=>$k));?>" onClick="return confirm('是否将此菜单删除?')" title="Delete">删除</a> 
                      </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>             
            </table>
                    </div>
                </div>
    </div>     
    
    <!--图文预览-->
    <?php if(($nrs["type"] == 0) and ($nrs["conf"] != '')): ?><div  class="content-box">
           <div class="content-box-header">
                <h4 style="cursor: s-resize;">图文预览</h4>
            </div>
          <div class="content-box-content" style="display: block;">
              <?php $len=count($nrs['conf']); ?>
              <?php $len = $len; ?>
              <?php if($len == 1): ?><!--单图文-->
              <div style="border:1px solid #CCC;width:30%;float: left">
                  <p style="text-align: center;font-weight:700 "><?php echo ($nrs['conf'][0]['Title']); ?></p>
                  <p><img src="<?php echo ($nrs['conf'][0]['PicUrl']); ?>" style="width: 100%;height:140px;"></p>
                  <p style="text-align: center"><?php echo ($nrs['conf'][0]['Description']); ?></p>
              </div>
              <?php elseif($len > 1): ?>
              <!--单图文-->
              <!--多图文-->
              <div style="border:1px solid #CCC;width:30%;">
                  <div>
                      <img src="<?php echo ($nrs['conf'][0]['PicUrl']); ?>" style="width: 100%;height:120px;">
                      <div style="margin-top: -25px;color:whitesmoke;background: #000;opacity: 0.6;padding: 5px 10px;"><?php echo ($nrs['conf'][0]['Title']); ?></div>
                  </div>
                  <?php if(is_array($nrs["conf"])): $i = 0; $__LIST__ = array_slice($nrs["conf"],1,null,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div style="border-top: 1px solid #CCC;padding:5px;">
                     <?php echo ($item['Title']); ?>
                     <img src="<?php echo ($item['PicUrl']); ?>" style="width: 60px;height: 60px;float: right;vertical-align: middle;"/>
                     <div class="clear" id="bef"></div>
                  </div><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
              <!--多图文--><?php endif; ?>
              
              <div class="clear" id="bef"></div>
          </div>
      </div><?php endif; ?>
      <!--图文预览-->
    
    <div class="clear" id="bef"></div>
 <!--kindeditor-->
<link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>
<!--kindeditor-->     
      
<script>
$(function(){
  $(".text-radio").click(function(){
    var ckv = $(".text-radio:checked").val();
    if(ckv==1){
      $(".column-right").css("display","none");
      $(".column-left").css("display","none");
    }else{
      $(".column-right").css("display","");
      $(".column-left").css("display","");
    }
  });
  $('.selfurl').change(function(){
	  $("input[name='url']").val($(this).val());
  });
});
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