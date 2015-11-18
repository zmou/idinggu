<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>提现-<?php echo ($webinfo["web_name"]); ?></title>
<link href="__PUBLIC__/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="__PUBLIC__/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/alert.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/common.js"></script>
<style type="text/css">
body{ background:#E1E1E1;}
.to_bank{display:none;}
</style>
<!-- 地区选择--> 
<script type="text/javascript" src="__PUBLIC__/js/geo.js" charset="gb2312"></script>
</head>
<body>
<div class="index_tab">
	<ul>
		<li><a href="javascript:" id="alipay" class="act">支付宝</a></li>
		<li><a href="javascript:" id="to_bank">银行卡</a></li>
	</ul>
</div>
<script>
$('#alipay').click(function(){
	$('#to_bank').removeClass('act');
	$(this).addClass('act');
	$('.alipay').show();
	$('.to_bank').hide();
	$('#pay_type').val('alipay');
});
$('#to_bank').click(function(){
	$('#alipay').removeClass('act');
	$(this).addClass('act');
	$('.alipay').hide();
	$('.to_bank').show();
	$('#pay_type').val('bank');

	setup();
	preselect('陕西省');
	promptinfo();
});
</script>
<div class="ucenter_list">
	<ul>
		<li class="alipay">
		<b>支付宝账号</b> <p><input name="alipay" type="text" placeholder="请输入支付宝账号"/></p>
		</li>

		<li class="to_bank">
		<b>开户银行</b> 
		<p style="padding-top:8px;">
		<select name="bank_name" class="select1">
			<option value="">--选择银行--</option>
			<?php if(is_array($banks)): $i = 0; $__LIST__ = $banks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["title"]); ?>"><?php echo ($item["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>
		</p>
		</li>
		<li class="to_bank">
		<b>所在地区</b> 
		<p style="padding-top:8px;">
		<select class="select2" name="province" id="s1"> 
			<option value="">--选择省份--</option>
		</select> 
		<select class="select2" name="city" id="s2"> 
			<option value="">--选择城市--</option>
		</select> 
		</p>
		</li>
		<li class="to_bank">
		<b>银行卡号</b> <p><input name="bank_card" type="text" placeholder="请输入银行卡号" onkeyup="cardInsertBlank()" id="cid"/></p>
		</li>



		<li>
		<b>收款人姓名</b> <p><input name="true_name" type="text" placeholder="请输入开户人姓名"/></p>
		</li>
		<li>
		<b>手机号</b> <p><input name="mobile" type="tel" value="<?php echo ($user_info['mobile']); ?>" placeholder="请输入11位手机号"/></p>
		</li>
		<li>
		<b>验证码</b> 
		<p>
			<input name="check_code" type="text" placeholder="请输入验证码"/> 
			<em>

				<input type="button" style="background:#EC584D;" id="send_sms" class="button1" value="获取" />
			</em>
		</p>
		</li>
		<li>
		<b>提现金额(元)</b> <p><input name="money" type="tel" placeholder="本次可提现<?php echo ($user_info["money_account"]); ?>元"/></p>
		</li>
	</ul>
</div>

<div class="myform">
	<ul>
		<li>
			<input type="hidden" id="pay_type" value="alipay"/>
			<input type="hidden" id="total_money" value="<?php echo ($user_info["money_account"]); ?>"/>
			<input type="hidden" id="min_withdraw_money" value="<?php echo ($webinfo["min_withdraw_money"]); ?>"/>
			<input name="" id="do_submit" type="button" value="提交" class="button1"/>
		</li>
	</ul>
</div>

<div class="main f12" style="color:#999;">
	<?php echo ($webinfo["withdraw_desc"]); ?>
</div>

<script>
//这个函数是必须的，因为在geo.js里每次更改地址时会调用此函数
function promptinfo()
{
	var address = document.getElementById('address');
	var s1 = document.getElementById('s1');
	var s2 = document.getElementById('s2');
	//var s3 = document.getElementById('s3');
	address.value = s1.value + s2.value;
}

</script>

<script>
$(function(){

		var tt = 60;
		function set_time()
		{
			if(tt==0)
			{
				$('#send_sms').val('获取');
				$('#send_sms').removeAttr('disabled');
				return false;
			}
			tt -= 1;
			$('#send_sms').val('重新发送'+tt);


		}

		$('#send_sms').click(function(){
			var mobile = $("input[name='mobile']").val();

			var mobile = $.trim(mobile);
			var isMobile = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1})|(17[0-9]{1})|(14[0-9]{1}))+\d{8})$/;  
			if(!isMobile.exec(mobile) && mobile.length != 11)
			{
				alert('请输入合法的手机号码！');
				return false;
			}

			$.ajax({
				type: 'get',
				url: '<?php echo U('Ajax/send_sms');?>',
				data: {'mobile':mobile},
				success: function(data){
					if(data == 0)
					{
						alert('每天只能提现一次！');
						return false;
					}
					else
					{
					//alert(data);
					$('#send_sms').val('重新发送');
					$('#send_sms').attr('disabled','disabled');
					setInterval(set_time, 1000);
					}
				}
			});
		});

		$("#do_submit").click(function(){

			var pay_type = $('#pay_type').val();
			var money_account="<?php echo ($user_info['money_account']); ?>";
			var post_data={};

			/******************************check alipay************************************************/
			if(pay_type == 'alipay')
			{
				if($("input[name='alipay']").val() == '')
				{
					alert('请输入支付宝账号！');
					return false;
				}
				post_data.alipay = $("input[name='alipay']").val();
			}

			/*******************************check bank************************************************/
			else
			{
				if(!$("select[name='bank_name']").val())
				{
					alert('请选择银行！');
					return false;
				}
				if($("select[name='province']").val() == '省份')
				{
					alert('请选择银行所在省份！');
					return false;
				}
				if($("select[name='city']").val() == '城市')
				{
					alert('请选择银行所在城市！');
					return false;
				}
				if($("input[name='bank_card']").val() == '')
				{
					alert('请输入银行卡号！');
					return false;
				}
				
				post_data.bank_name = $("select[name='bank_name']").val();
				post_data.bank_card = $("input[name='bank_card']").val();
				post_data.province = $("select[name='province']").val();
				post_data.city = $("select[name='city']").val();
			}

			/*******************************check other info**************************************************/
			if($("input[name='true_name']").val()=='')
			{
				alert('请填写真实姓名！');
				return false;
			}
			if($("input[name='mobile']").val()=='')
			{
				alert('请填手机号码！');
				return false;
			}
			if($("input[name='check_code']").val()=='')
			{
				alert('请填输入收到的短信验证码！');
				return false;
			}
	
			post_data.true_name = $("input[name='true_name']").val();
			post_data.mobile = $("input[name='mobile']").val();


			/*************************chekc short message*****************************************/
			var sms_ok = 1;
			var check_code = $("input[name='check_code']").val();
			$.ajax({
				async: false,
				type: 'get',
				url: '<?php echo U('Ajax/check_sms');?>',
				data: {'sms':check_code},
				success: function(data)
				{
					if(data == 1)
					{
					}
					else
					{
						sms_ok = 0;
						//alert('您输入的验证码有误，请重新输入！');
						return false;
					}
				}
			});

			if(sms_ok == 0)
			{
				alert('您输入的验证码有误，请重新输入！');
				//return false;
			}

			/***************************post data**************************************/


			post_data.pay_type = $('#pay_type').val();


			post_data.money=$("input[name='money']").val();
			if(post_data.money==''){
			alert('请输入提现金额！');
			$("input[name='money']").focus();
			return false;
			}


			var min_withdraw_money = parseFloat($('#min_withdraw_money').val());
			if(parseFloat(post_data.money) < min_withdraw_money){
				alert('提现金额低于'+min_withdraw_money+'！');
				$("input[name='money']").focus();
				return  false;
			}

			if(parseFloat(post_data.money)>parseFloat(money_account)){
			alert('提现金额不能大于可用余额！');
			$("input[name='money']").focus();
			return  false;
			}
			$.post("<?php echo U('Ajax/take_money');?>",post_data,function(json){
				if(json.errcode==1){
				alert(json.msg);
				}else{
				alert('提交申请成功！');
				location.href="<?php echo U('take_money_ok');?>"
				}
				},'json');
		});
});
</script>
</body>
</html>