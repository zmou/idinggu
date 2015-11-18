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
          
<h4>订单管理</h4>
<a style="margin:5px 10px;" href="<?php echo U('export_excel');?>" class="btn align-right">导出Excel</a> 

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
    <style>
        select,input[type='text']{border-radius:3px;padding: 3px 5px;border:1px solid #CCC}
    </style>
          <div class="tab-content default-tab" id="tab1">
          
            <div class="notification success png_bg" id="dmsg" style="display:none">
              <a href="#" class="close"><img src="__PUBLIC__/Images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
              <div>
                订单提示！
              </div>
            </div>
            
            
			<!--area select order-->

            <p>
				<form action="/index.php?g=Admin&m=Shop&a=shop_order" id="search_form" method="post">
                筛选：
                <select name="province_id" id="province_id">
                </select>
                省
				<select name="city_id" id="city_id">
                </select>
                市
				<select name="district_id" id="district_id">
                </select>
                区

				<select name="school_id" id="school_id">
                </select>
				<select name="build_id" id="build_id">
                </select>

				&nbsp;&nbsp;&nbsp;&nbsp;
				订单状态：
				<select name="order_status" id="order_status">
					<option value="1" selected>未发货</option>
					<option value="3">已签收</option>

                </select>
				
                <input id='search_btn' type="submit" value="确定" class="button"/>
				</form>
			</p>

			<!--area select order end-->
            <p>
                搜索：
                <select name="key">
                    <option value="order_sn">订单编号</option>
                    <option value="consignee">收货人</option>    
                    <option value="mobile">联系电话</option>    
                </select>
                <input value="<?php echo ($_GET['val']); ?>" name="val" type="text" class="text-input small-input" placeholder="关键字"/>
                
                 下单时间：
                <input value="<?php echo ($_GET['begin_time']); ?>" name="begin_time" type="text" class="text-input small-input" placeholder="起始时间" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/> ~
                <input value="<?php echo ($_GET['end_time']); ?>" name="end_time" type="text" class="text-input small-input" placeholder="截止时间" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})"/>
                
                <input id='btn-so' type="button" value="搜索" class="button"/>
                &nbsp;&nbsp;&nbsp;
                <a  href="<?php echo U('index');?>">查看全部</a>
                &nbsp;&nbsp;&nbsp;
                <a class="btn <?php if(($_GET['order_status']) == "1"): ?>btn-danger<?php endif; ?>" href="<?php echo U('index',array('order_status'=>1));?>">未发货</a>
                <a class="btn <?php if(($_GET['order_status']) == "2"): ?>btn-success<?php endif; ?>" href="<?php echo U('index',array('order_status'=>2));?>">已发货</a>
                <a class="btn <?php if(($_GET['order_status']) == "3"): ?>btn-success<?php endif; ?>" href="<?php echo U('index',array('order_status'=>3));?>">已签收</a>
                
            </p>
            <table>
              <thead>
                <tr>
                   <th><input class="check-all" type="checkbox" /></th>
                   <th>订单编号</th>
                   <th>收货人</th>
                   <th>联系电话</th>
                   <th>订单金额</th>
                   <th>商品总价</th>
                   <!--<th>客户确认</th>-->
                   <th>订单状态</th>
                   <th>支付状态</th>
                   <th>下单时间</th>
                   <th>操作</th>
                </tr>
              </thead>

              <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                  <td><input type="checkbox" /></td>
                  <td><a title="点击查看" href="<?php echo U('edit',array('id'=>$v['id']));?>"><?php echo ($v["order_sn"]); ?></a></td>
                  <td><?php echo ($v["consignee"]); ?></td>
                  <td><?php echo ($v["mobile"]); ?></td>
                  <td><b>&yen; </b><?php echo ($v["total_fee"]); ?></td>
                  <td><b>&yen; </b><?php echo ($v["total_price"]); ?></td>
                  <!--<td><a class="btn"><?php if(($v["is_confirm"]) == "1"): ?>已确认<?php else: ?><font color="red">未确认</font><?php endif; ?></a></td>-->
                  <td><a class="btn"><?php echo (order_status($v["order_status"])); ?></a></td>
                  <td>
                 <!-- <a class="btn" title="修改订单支付状态" href="<?php echo U('update_pay_status',array('order_id'=>$v['id'],'p'=>I('get.p','1')));?>">
                  -->
                  <a class='btn'>
                  <?php if(($v["pay_status"]) == "1"): ?>已支付<?php else: ?><font color="red">未支付</font><?php endif; ?>
                  </a></td>
                  <td><?php echo (date('Y-m-d H:i:s',$v["order_time"])); ?></td>
                  <td>
                  	<!--<?php if(($v['fenyong_status'] == 0) and ($v['shop_id'] > 0)): ?><a class="btn" href="<?php echo U('fenyong',array('id'=>$v['id']));?>">分佣</a><?php endif; ?>-->
                  
                    <a class="btn btn-success" href="<?php echo U('order_detail',array('id'=>$v['id']));?>">详情</a>
                    <a class="btn btn-danger" href="<?php echo U('export_shop_order',array('order_id'=>$v['id']));?>">导出</a>
                  </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>

              <tfoot>
                <tr>
                  <td colspan="10">
                    <div class="pagination">
                      <?php echo ($show); ?>
                    </div>
                    <div class="clear"></div>
                  </td>
                </tr>
              </tfoot>              
            </table>
          </div> <!-- End #tab1 -->  
<script type='text/javascript'>
  $(function(){
	  $("#btn-so").click(function(){
		  
		  var param='';
		  
		  var key=$("select[name='key'] option:selected").val();
		  var val=$("input[name='val']").val();
		  
		  var begin_time=$("input[name='begin_time']").val();
		  var end_time=$("input[name='end_time']").val();
		  
		 
		  
		  if(key!=''&&val!=''){
			 param+="&key="+key+'&val='+val;
		  }
		  
		  if(begin_time!=''){
			   param+='&begin_time='+begin_time;
		  }
		  
		  if(end_time!=''){
			   param+='&end_time='+end_time;
		  }
		  
		  if(param==''){
			  alert('请输入搜索条件！')
			  //artDialog({content:'请输入搜索条件！', style:'alert', lock:false}, function(){});
		  }else{
			  location.href="<?php echo U('index');?>"+param;
		  }
		  
	  });
	  
  })


	/*
	   地区联动
	   */
var province_id = '<?php echo ($map["province_id"]); ?>';
var city_id = '<?php echo ($map["city_id"]); ?>';
var district_id = '<?php echo ($map["district_id"]); ?>';
var school_id = '<?php echo ($map["school_id"]); ?>';
var build_id = '<?php echo ($map["build_id"]); ?>';

	$.post("index.php?g=Admin&m=Ajax&a=province",'',function(json){
		var html='<option value="0">-请选择-</option>';
		$.each(json,function(i,obj){
				if(province_id == obj.id)
				{
					html+='<option value='+obj.id+' selected>'+obj.region_name+'</option>';
				}
				else
				{
					html+='<option value='+obj.id+'>'+obj.region_name+'</option>';	
				}
		});
		$("#province_id").html(html);
	},'json');

if(province_id)
{
	
		$.post("index.php?g=Admin&m=Ajax&a=city",{'parent_id':province_id},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				if(city_id==obj.id)
				{
					html+='<option value='+obj.id+' selected>'+obj.region_name+'</option>';
				}
				else
				{
					html+='<option value='+obj.id+'>'+obj.region_name+'</option>';	
				}
			});
			$("#city_id").html(html);
		},'json');
}
if(city_id)
{
	
		$.post("index.php?g=Admin&m=Ajax&a=district",{'parent_id':city_id},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				if(district_id==obj.id)
				{
					html+='<option value='+obj.id+' selected>'+obj.region_name+'</option>';
				}
				else
				{
					html+='<option value='+obj.id+'>'+obj.region_name+'</option>';	
				}
			});
			$("#district_id").html(html);
		},'json');
}
if(district_id)
{
	
		$.post("index.php?g=Admin&m=Ajax&a=school",{'county_id':district_id},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				if(school_id==obj.id)
				{
					html+='<option value='+obj.id+' selected>'+obj.name+'</option>';
				}
				else
				{
					html+='<option value='+obj.id+'>'+obj.name+'</option>';	
				}
			});
			$("#school_id").html(html);
		},'json');
}
if(school_id)
{
	
		$.post("index.php?g=Admin&m=Ajax&a=build",{'sch_id':school_id},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				if(build_id==obj.id)
				{
					html+='<option value='+obj.id+' selected>'+obj.name+'</option>';
				}
				else
				{
					html+='<option value='+obj.id+'>'+obj.name+'</option>';	
				}
			});
			$("#build_id").html(html);
		},'json');
}
	$("#province_id").change(function(){
		$.post("index.php?g=Admin&m=Ajax&a=city",{'parent_id':$(this).val()},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				if(city_id==obj.id)
				{
					html+='<option value='+obj.id+' selected>'+obj.region_name+'</option>';
				}
				else
				{
					html+='<option value='+obj.id+'>'+obj.region_name+'</option>';	
				}
			});
			$("#city_id").html(html);
		},'json');
	});

	$("#city_id").change(function(){
		$("#district").html('<option value="0">-区县-</option>');
		$.post("index.php?g=Admin&m=Ajax&a=district",{'parent_id':$(this).val()},function(json){
			var html='<option value="">-请选择-</option>';
			$.each(json,function(i,obj){
				html+='<option value='+obj.id+'>'+obj.region_name+'</option>';
			});
			$("#district_id").html(html);
		},'json');
	});

$('#district_id').change(function(){
	var county_id = $(this).val();
	alert(county_id);
	$.post("<?php echo U('Ajax/school');?>",{'county_id':county_id},function(data){
		
		school_str = "<option value='0'>请选择学校</option>";
			if(!data)
			{
				alert('该区暂时无学校！');
				
				$('#school').html('');

				return false;
			}
			for(i=0; i<data.length; i++)
			{
				build = data[i];
				school_str += "<option value='"+build.id+"'>"+build.name+"</option>";			
			}
			//alert(build_str);
			$('#school_id').html(school_str);
		},'json');
});

$('#school_id').change(function(){
	var school_id = $(this).val();
	
	$.post("<?php echo U('Ajax/build');?>",{'sch_id':school_id},function(data){
		
		build_str = "<option value='0'>请选择楼栋</option>";
			if(!data)
			{
				alert('该学校暂时没有开放！');
				
				$('#build').html('');

				return false;
			}

			for(i=0; i<data.length; i++)
			{
				build = data[i];
				build_str += "<option value='"+build.id+"'>"+build.name+"</option>";			
			}
			//alert(build_str);
			$('#build_id').html(build_str);
		},'json');
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