<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>跳转提示</title>
        <style type="text/css">
            *{ padding: 0; margin: 0; }
            body{background: #fff; font-family: arial,'微软雅黑','黑体'; color: #333; font-size: 16px; }
            .system-message{ border:3px solid #D74F4F;border-radius:2px;width:360px;height:180px;margin:8% auto;background:url('/Public/Admin/themes/index_bg.jpg') no-repeat bottom center #FFF;}
			.system-message .alt{height:20px;margin:0px;padding:5px;background-color:#D74F4F;color:white;}
            .system-message h1{font-size:200px; font-weight: normal; line-height: 200px; margin-bottom: 12px; }
            .system-message .jump{ padding-top: 10px}
            .system-message .jump a{ color: #333;}
            .system-message .jump #wait{color:#D74F4F; font-size:60px; margin-top:0px;float:right; font-family:Arial}
            .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 20px }
            .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
        </style>
    </head>
    <body>
        <div class="system-message">
        	<div class="alt">友情提示</div>
            <div style="padding:10px 15px;">
                <?php if(isset($message)): if($message != ""): ?><p class="success">
                    <?php echo ($message); ?>
                    </p><?php endif; ?>
                    <?php else: ?>
                    <p class="error">
                    <img src="./Public/Static/Images/icons/cross_circle.png">
                    <?php echo ($error); ?>
                    </p>
                    </if><?php endif; ?>
                <p class="detail"></p>
                <p class="jump">
                    页面自动 <a id="href" href="<?php echo ($jumpUrl); ?>">跳转</a>  
                    <b id="wait"><?php echo ($waitSecond); ?></b>
                </p>
            </div>
        </div>
        <script type="text/javascript">
            (function() {
                var wait = document.getElementById('wait'), href = document.getElementById('href').href;
                var interval = setInterval(function() {
                    var time = --wait.innerHTML;
                    if (time == 0) {
                        location.href = href;
                        clearInterval(interval);
                    }
                }, 1000);
            })();
        </script>
    </body>
</html>