<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>咕币明细-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><dl class="coin_detail_list">
        <dt>
            <b><?php echo ($item["way_name"]); ?></b>
            <p class="font_gray"><?php echo (date('Y-m-d',$item["posttime"])); ?></p>
        </dt>
        <dd>
        <?php if(($item["type"]) == "1"): ?>+<?php else: ?>-<?php endif; ?>
        <?php echo ($item["amount"]); ?>
        </dd>
    </dl><?php endforeach; endif; else: echo "" ;endif; ?>

<?php if(count($list) == 0): ?><p><center>暂无数据</center></p><?php endif; ?>

<?php if(strlen($page) > 1): ?><p id="page"><?php echo ($page); ?></p><?php endif; ?>

</body>
</html>