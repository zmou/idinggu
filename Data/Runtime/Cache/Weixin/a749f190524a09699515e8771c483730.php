<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;" />
<!--<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />-->
<style type="text/css">
*{ padding: 0; margin: 0; }
body{ background: #fff; font-family: '微软雅黑'; color: #333; font-size: 16px; }
.system-message{ padding: 24px 48px; }
.system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
.system-message .jump{ padding-top: 10px}
.system-message .jump a{ color: #333;}
.system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px }
.system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
/*#main{top:300px;width:80%;line-height:25px;border:1px solid #FAFFBD;}
#title{padding:5px 10px;background:#F8943C;border-radius:4px;color:white}#FAFFBD*/
#main{top:300px;width:80%;line-height:25px;border:1px solid #EC584D;border-radius:6px;margin:45% auto;}
#title{padding:5px 10px;background:#EC584D;border-radius:4px;color:white}
#content{padding:20px;line-height:32px;;border-radius:4px;}
#wait{font-size:60px;float:right}
</style>
</head>
<body>
<!--中间内容 开始-->
<div class="HXwarp" id="main">
	<div class="area">
    	<div class="content960"><!--content960 col  start-->
            <?php if(isset($error)): ?><div class="wright"><!--wright  start-->
                    <p id='title'><?php echo($error); ?></p>
                        <div id="content">
                        页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 
                        等待时间： <b id="wait"><?php echo($waitSecond); ?>
                        </div>
                    </strong>
                </div><!--wright  end-->
            <?php else: ?>
                <div class="wright ri"><!--wright  start-->
                    <p id='title'><?php echo($message); ?></p>
                       <div id="content">
                        页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 
                        等待时间： <b id="wait"><?php echo($waitSecond); ?>
                        </div>
                    </strong>
                </div><!--wright  end--><?php endif; ?>
            
        </div><!--content960 col  start-->
    </div>
</div>
<!--中间内容 结束-->
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time == 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>