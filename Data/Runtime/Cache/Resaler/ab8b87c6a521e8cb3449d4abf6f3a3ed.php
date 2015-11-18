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
          
<h4>订单管理</h4>
<!--<a style="float:right;margin:10px;" href="<?php echo U('add');?>" class="btn">添加</a> -->

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
    <style>
        input[type='text']{border-radius:3px;padding: 3px 5px;border:1px solid #CCC}
    </style>
          <div class="tab-content default-tab" id="tab1">
          
            <div class="notification success png_bg" id="dmsg" style="display:none">
              <a href="#" class="close"><img src="__PUBLIC__/Images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
              <div>
                订单提示！
              </div>
            </div>
            
            <p>
                搜索：
                <select name="key">
                    <option value="order_sn">订单编号</option>
                    <option value="consignee">收货人</option>    
                    <option value="mobile">联系电话</option>    
                </select>
                <input value="<?php echo ($_GET['val']); ?>" name="val" type="text" class="text-input small-input" placeholder="关键字"/>
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
                   <th>订单状态</th>
                   <th>支付状态</th>
                   <th>下单时间</th>
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
                  <a class="btn" title="修改订单支付状态" href="<?php echo U('update_pay_status',array('order_id'=>$v['id'],'p'=>I('get.p','1')));?>">
                  <?php if(($v["pay_status"]) == "1"): ?>已支付<?php else: ?><font color="red">未支付</font><?php endif; ?>
                  </a></td>
                  <td><?php echo (date('Y-m-d H:i:s',$v["order_time"])); ?></td>
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
                  var key=$("select[name='key'] option:selected").val();
                  var val=$("input[name='val']").val();
                  if(val==''){
                      //alert('请输入关键字！')
					  artDialog({content:'请输入关键字！', style:'alert', lock:false}, function(){});
                  }else{
                      location.href+="&key="+key+'&val='+val;
                  }
                  
              });
              $('.auth').click(function(){
                  $.post("<?php echo U('auth');?>",{'id':$(this).attr('uid')},function(data){
                      data=JSON.parse(data);
                      alert(data.msg);
                      if(data.flag==1){
                          location.reload();
                      }
                  }, "json");
              });
          })
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