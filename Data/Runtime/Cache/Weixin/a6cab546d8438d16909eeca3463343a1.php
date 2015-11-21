<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>申请店长</title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/alert.js"></script>
</head>
<body>
<div class="apply_shopkeeper_step">
	<ul>
		<li><img src="__PUBLIC__/images/shopkeeper2_r2_c2.png" /><span>了解叮咕</span></li>
	    <li class="act"><img src="__PUBLIC__/images/shopkeeper2_r2_c4.png" /><span>填写申请</span></li>
	    <li class="s"><img src="__PUBLIC__/images/shopkeeper_r2_c8.png" /><span>申请成功</span></li>
	</ul>
</div>
<div style="margin-top:86px;"></div>
<div class="myform">
	<ul>
		<li>
			<b>学校：</b> 
            <p>
            <select name="sch_id" id="school" style="width: 90%;overflow: hidden">
            <option value="">-选择学校-</option>
            <?php if(is_array($school)): $i = 0; $__LIST__ = $school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>" <?php if(($curr_school) == $item['name']): ?>selected<?php endif; ?>><?php echo ($item["name"]); ?>【<?php echo ($item["city"]); ?>-<?php echo ($item["county"]); ?>】</option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </p>
		</li>
<script type="text/javascript">
$(document).ready(function(){
$('#schooldfdsjaldfd').change(function(){
	var school_id = $(this).val();
	//alert(school_id);
	$.ajax({
		type: 'get',
		url: '<?php echo U('Ajax/get_building');?>',
		data: {'school_id': school_id},
		dataType: 'json',
		success: function(data)
		{
			if(!data)
			{
				alert('该学校暂无可申请楼栋！');
				return false;
			}
			build_str = "";

			for(i=0; i<data.length; i++)
			{
				build = data[i];
				build_str += "<option value='"+build.id+"'>"+build.name+"</option>";			
			}
			//alert(build_str);
			//$('#build').append(build_str);
		}
	});
});
});
</script>
        <li>
			<b>楼栋：</b> 
            <p>
            <select name="build_id" id="build">
            <option value="">-选择楼栋-</option>
            <?php if(is_array($build_arr)): $i = 0; $__LIST__ = $build_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>" <?php if(($curr_build) == $item['name']): ?>selected<?php endif; ?>><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            </p>
		</li>
		<li>
			<b>姓名：</b> <p><input name="name" type="text" value="<?php echo ($user_info["name"]); ?>"/></p>
		</li>
				<li>
			<b>性别：</b> 
            <p><input name="sex" type="radio" value="1" <?php if(($user_info["sex"]) == "1"): ?>checked<?php endif; ?> />男&nbsp;&nbsp;&nbsp;&nbsp;
            <input name="sex" type="radio" value="2" <?php if(($user_info["sex"]) == "2"): ?>checked<?php endif; ?>/>女</p>
		</li>
				<li>
			<b>手机：</b> <p><input class="number" name="mobile" type="text" value="<?php echo ($user_info["mobile"]); ?>"/></p>
		</li>
		<li>
			<div class="space10"></div>
			<input  type="button" value="下一步" class="button1" id="btn-sub"/>
			<div class="space10"></div>
		</li>
	</ul>
</div>
</body>
<script>
$(function(){
	$("#btn-sub").click(function(){
		var post_data={};
		post_data.name=$("input[name='name']").val();
		post_data.mobile=$("input[name='mobile']").val();
		post_data.sex=$("input[name='sex']:checked").val();
		post_data.sch_id=$("#school").val();
		post_data.build_id=$("#build").val();
		if(post_data.name==''){
		
			//alert('请填写姓名');
			$("input[name='name']").focus();
			return false;
		}
		if(post_data.mobile==''){
			alert('请填写11位手机号');
			$("input[name='mobile']").focus();
			return false;
		}
		if(post_data.sex==''){
			alert('请选择性别');
			return false;
		}
		if(post_data.sch_id==''){
			alert('请选择学校');
			return false;
		}
		if(post_data.build_id==''){
			alert('请选择楼栋');
			return false;
		}

		$.post("<?php echo U('Ajax/shop_apply');?>",post_data,function(data){
			alert('申请提交成功');
			location.href="<?php echo U('Ucenter/apply_shopkeeper3');?>"
		});
	});
});
</script>
</html>