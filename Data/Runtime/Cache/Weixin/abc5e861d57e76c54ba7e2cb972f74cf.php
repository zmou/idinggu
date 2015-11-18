<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>奥克斯空调</title>
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/dist/css/bootstrap-theme.css">
	<link rel="stylesheet" href="__PUBLIC__/dist/css/font-awesome.css">
    <script src="__PUBLIC__/js/jquery.1-7-1.js"></script>
    <!--[if IE 7]>
    <link rel="stylesheet" href="__PUBLIC__/dist/css/font-awesome-ie7.css">
    <![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>

<body class="page bg">
    <header class="navbar po-re">
        <div class="navbar-icon">
            <a href="javascript:history.go(-1);" class="left-back">
                <span class="glyphicon glyphicon-chevron-left">返回</span>
			</a>
		</div>
        <span class="nav-title">登录</span>
   </header>
   
   <div class="container">
		 <div class="login-textwapper mt15">
				<input name="username" type="text" placeholder="请输入您的手机/邮箱">
				<input name="password" type="password"  placeholder="请填写密码">
				<input name="verify" type="text" class="bd0" placeholder="输入验证码">
				<span class="yzm">
                <img onClick="this.src='<?php echo U('verify');?>'+'&rand='+Math.random()" src="<?php echo U('verify');?>" width="108px">
                </span>
		 </div>
		
		 <div class="text-center mt15">
			<a id="btn-login" class="col-xs-12  btn btn-warning btn-lg  border-r10">登 录</a>
		</div>
		<div class="login-reg">
        <span class="left" onClick="javascript:location.href='<?php echo U('reg');?>'">注册账户</span>
        <a href="#"  class="right">忘记密码？</a>
        </div>
	</div>   
	   
</body>
<script>
$(function(){
	$("#btn-login").click(function(){
		var post_data={};
		post_data.username=$("input[name='username']").val();
		post_data.password=$("input[name='password']").val();
		post_data.verify=$("input[name='verify']").val();
		if(post_data.username==''){
			alert("请输入用户名");
			return false;
		}
		if(post_data.password==''){
			alert("请输入密码");
			return false;
		}
		if(post_data.verify==''){
			alert("请输入验证码");
			return false;
		}
		if("<?php echo I('get.jump');?>"!=''){
			post_data.jump="<?php echo I('get.jump');?>";
		}
		//console.log(post_data);
		//return ;
		$.post("<?php echo U('Member/do_login');?>",post_data,function(json){
			if(json.errcode==1){
				alert('验证码错误');
			}
			if(json.errcode==2){
				alert('用户名或密码错误');
			}
			if(json.errcode==0){
				if(json.jump!=''){
					location.href=json.jump;	
				}else{
					location.href="<?php echo U('Ucenter/index');?>";
				}
			}	
			
		},'json');
	});
});
</script>
</html>