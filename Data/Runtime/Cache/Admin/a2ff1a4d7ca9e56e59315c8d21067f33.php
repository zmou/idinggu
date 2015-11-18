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
  

<script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>-->


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
          
<h4><?php if(I('get.id') > 0): ?>[修改]<?php else: ?>[新增]<?php endif; ?>文章</h4>  
<a href="<?php echo U('artlist');?>" style="float: right;margin:5px 10px;" class="btn">返回</a>

          <div class="clear"></div>
        </div>
        <div class="content-box-content">
          
<div class="tab-content default-tab" id="tab1">
<!--ueditor-->
<!--<link href="/plugins/ueditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/umeditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugins/ueditor/umeditor.min.js"></script>
<script type="text/javascript" src="/plugins/ueditor/lang/zh-cn/zh-cn.js"></script>	-->
<!--ueditor-->

<!--kindeditor-->
<link rel="stylesheet" href="/plugins/kindeditor/themes/default/default.css" />
<script charset="utf-8" src="/plugins/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/plugins/kindeditor/lang/zh_CN.js"></script>
<!--kindeditor-->

<!--uploadify-->
<script src="/plugins/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link href="/plugins/uploadify/uploadify.css" rel="stylesheet" type="text/css" >
<!--uploadify-->
<style type="text/css">
.btn-del{background-color:#C00;padding:5px;color:white;border-radius:3px;border:0;cursor:pointer}
</style>
		
<form method="post" action="<?php echo U('artaddhandle',array('id'=>I('get.id')));?>" enctype="multipart/form-data">
    <fieldset>
    <p>
        文章标题：
        	<input required="required" type="text" name="title"  class="text-input small-input" value="<?php echo ($nrs["title"]); ?>"> 
    </p>
    <p>
        所属栏目：
        	<select name="fid" id='fid'>
                <?php if(is_array($sort)): $i = 0; $__LIST__ = $sort;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["id"]); ?>" <?php if(($nrs['fid'] == $v['id']) OR (I('get.fid') == $v['id'])): ?>selected<?php endif; ?>><?php echo ($v["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>	
    </p>
    <p>
        排　　序：
        	<input  type="text" name="lists"  class="text-input small-input" value="<?php echo ($nrs["lists"]); ?>" placeholder='顺序排列'> 
    </p>
    <p>
        文章作者：
        	<input type="text" name="author"  class="text-input small-input" value="<?php echo ($nrs["author"]); ?>"> 
    </p>
  <!-- <p>视频地址：
        	<input type="text" name="mvurl"  class="text-input small-input" value="<?php echo ($nrs["mvurl"]); ?>">&nbsp;<span><font color='red'>【请先将视频上传至优酷】</font>flash地址:http://player.youku.com/player.php/sid/XMzg2OTg3ODEy/v.swf</span></p>-->
    <p>
        内容简介：
        	<textarea name="descrip" id="textarea" class="textarea small-input v-middle"><?php echo ($nrs["descrip"]); ?></textarea>
    </p>
    <p>
        文章属性：
        	<input type="checkbox" name="istui" value="1" <?php if(($nrs["istui"]) == "1"): ?>checked<?php endif; ?>>推荐 &nbsp;
           <!-- <input type="checkbox" name="istop" value="1" <?php if(($nrs["istop"]) == "1"): ?>checked<?php endif; ?> >置顶 &nbsp;
        	<input type="checkbox" name="iswx" value="1" <?php if(($nrs["iswx"]) == "1"): ?>checked<?php endif; ?>>微官网 &nbsp;-->
    </p> 
    <!--<p>
        <span id='addfile'>缩 略 图</span>：
        <input id="tu1" type="file" onchange="document.getElementById('tu11').value=this.value;" style="display:none;" name="spic[]">
        <input readonly='readonly' id="tu11" value="<?php echo ($nrs["spic"]); ?>" class="text-input small-input" type="text">&nbsp;
        <a class="btn" onclick="document.getElementById('tu1').click();">选择图片</a>
        <font style="color:red">&nbsp;
        <span class='gj_alt' style="display:none">一品管家背景图</span>&nbsp;【图片大小不能超过2M】</font>
    </p>-->
    <p>
    缩 略 图：
    <input readonly name="spic" type="text" id="url1" value="<?php echo ($nrs["spic"]); ?>" class="text-input small-input"/> 
    <input type="button" id="image1" value="选择图片" class="button"/>
    <font style="color:red">&nbsp;【图片大小不能超过1M】</font>
    </p>

<!--    <p id="upload_file">
        <span>上传文件</span>：
        <input id="tu2" type="file" onchange="document.getElementById('tu22').value=this.value;" style="display:none;" name="files[]">
        <input readonly='readonly' id="tu22" value="<?php echo ($nrs["picurl"]); ?>" class="text-input small-input" type="text">&nbsp;
        <a class="btn" onclick="document.getElementById('tu2').click();">选择文件</a>
        <font style="color:red">&nbsp;【文件大小不能超过2M】</font>
    </p>-->
    <!--<p>
    <input type="button" id="J_selectImage" value="批量上传" />
    <div id="J_imageView"></div>
    </p>-->
     <div id='photo-area' style="display:none;height:auto;">
    	<p>上传照片：</p>
        <form method="post" action="<?php echo U('Admin/Photo/upload');?>" style="margin-left: 20px;">
		<div id="queue"></div>
            <input id="file_upload" name="file_upload" type="file" multiple="true">
        </form>
        <fieldset>
            <legend>照片列表</legend>
            <div id='preview'>
                <?php if(is_array($nrs["picurl"])): $i = 0; $__LIST__ = $nrs["picurl"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><p>缩略图<?php echo ($key); ?>：
                    <img src='<?php echo ($val); ?>' style="width:80px;vertical-align:middle;border-radius:3px;border:2px solid  #CCC;">&nbsp;
                    <input type='text' name='picurl[]' readonly='readonly' style='width:300px' class='text-input' value='<?php echo ($val); ?>'>
                    <input class='btn-del' type='button' value='删除' onclick='del(this)'>
                    </p><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </fieldset>
    </div>
    
    <p>
    	文章内容：<textarea id="myEditor" name="content"  style="height:300px;"><?php echo (stripslashes(htmlspecialchars_decode($nrs["content"]))); ?></textarea>
<script type="text/javascript">
	//var um = UM.getEditor('myEditor');
</script>
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
    </p>    
	<p>
		<input type="submit" value="  提 交  " class="button">
	</p>
    </fieldset>
	<div class="clear"></div>
</form>

</div>
<script>
function del(obj){
	if(!confirm('确认删除?')){
		return false;
	}
	$(obj).parent().remove();
}
$(function(){
	var fid=$("#fid").val();
	if(fid==2){
		$(".gj_alt").show();
	}else{
		$(".gj_alt").hide();
	} 	
	   
	$("#fid").click(function(){
		if($(this).val()==2){
			$(".gj_alt").show();
		}else{
			$(".gj_alt").hide();
		} 				  				  
	});	
})
</script>
<script type="text/javascript">
$(function() {
	$("#file_upload").uploadify({
		'swf': '/plugins/uploadify/uploadify.swf',
		'uploader': '/index.php?g=Admin&m=Photo&a=upload',
		'cancelImg': '/plugins/uploadify/uploadify-cancel.png',
		'queueID': 'fileQueue',
		'auto': true,
		'multi': true,
		'debug': false, //开启调试模式
		'removeTimeout' : 1,//文件队列上传完成1秒后删除 
		'method'   : 'post',//方法，服务端可以用$_POST数组获取数据
		'buttonText' : '选择照片',//设置按钮文本
		'width':'60',
		'multi'    : true,//允许同时上传多张图片
		'uploadLimit' : 10,//一次最多只允许上传10张图片
		'fileTypeExts' : '*.gif; *.jpg; *.png',//允许上传的图片格式---注意前端判断过，后端必须要判断
		'fileSizeLimit' : '2MB',//限制上传的图片不得超过200KB 
		'onUploadSuccess' : function(file, data, response){
			data=JSON.parse(data);
			if(data.flag==false){
				alert(data.msg);
			}else{
				$('#preview').append("<p>缩略图：<input type='text' name='picurl[]' placeholder='' value='"+data.url+"' readonly='readonly' style='width:300px' class='text-input'><input class='btn-del' type='button' value='删除' onclick='del(this)'></p>");
			}
			
		},
		'onUploadError':function(event, ID, fileObj, errorObj){
			//alert(fileObj);
		}
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