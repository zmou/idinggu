<?php
/**
 * 退款申请接口
 * ====================================================
 * 注意：同一笔单的部分退款需要设置相同的订单号和不同的
 * out_refund_no。一笔退款失败后重新提交，要采用原来的
 * out_refund_no。总退款金额不能超过用户实际支付金额(现
 * 金券金额不能退款)。
*/

	include_once("../WxPayPubHelper/WxPayPubHelper.php");
	include_once("../class/db.class.php");
	header('content-type:text/html;charset=utf-8');
	//================获取退款订单信息====================//
	
	if($_POST){
		$order_id=$_POST['order_id'];			//订单id
		
		$refund_fee=$_POST['refund_fee'];		//退款金额	
		
		$db=new Connection();
		$query=$db->query("select * from `twotree_order_info` where id=$order_id");
		$order_info=$db->get_one($query);
		$query=$db->query("select * from `twotree_order_info` where id={$order_info['user_id']}");
		$user_info=$db->get_one($query);
	

	//==================================退款=========================================//
	 	$out_refund_no=$out_trade_no=$order_info['out_trade_no'];
		$total_fee=$refund_fee=$refund_fee*100;			//单位：分【总金额=退款金额】
		//商户退款单号，商户自定义，此处仅作举例
		$out_refund_no = "$out_trade_no".time();
		//总金额需与订单号out_trade_no对应，demo中的所有订单的总金额为1分
		//使用退款接口
		$refund = new Refund_pub();
		//设置必填参数
		//appid已填,商户无需重复填写
		//mch_id已填,商户无需重复填写
		//noncestr已填,商户无需重复填写
		//sign已填,商户无需重复填写
		$refund->setParameter("out_trade_no","$out_trade_no");//商户订单号
		$refund->setParameter("out_refund_no","$out_refund_no");//商户退款单号
		$refund->setParameter("total_fee","$total_fee");//总金额
		$refund->setParameter("refund_fee","$refund_fee");//退款金额
		$refund->setParameter("op_user_id",WxPayConf_pub::MCHID);//操作员
		//非必填参数，商户可根据实际情况选填
		//$refund->setParameter("sub_mch_id","XXXX");//子商户号 
		//$refund->setParameter("device_info","XXXX");//设备号 
		//$refund->setParameter("transaction_id","XXXX");//微信订单号
		//调用结果
		$refundResult = $refund->getResult();
		/*echo "<pre>";
		print_r($refundResult);die();*/
		//商户根据实际情况设置相应的处理流程,此处仅作举例
		if ($refundResult["result_code"] == "FAIL") {
			header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php?g=Admin&m=Order&a=refund_fail&order_id='.$order_id.'&err_msg='.$refundResult['err_code_des']);
			//echo "通信出错：".$refundResult['err_code_des'];
		}elseif($refundResult['result_code']=='SUCCESS'&&$refundResult['return_code']=='SUCCESS'){		//退款成功！
			//修改订单状态
			$refund_fee=$refund_fee/100;		//单位元
			$refund_time=time();
			//订单状态：关闭；支付状态：已退款
			$db->query("update `twotree_order_info` set order_status=4,pay_status=3,refund_fee=$refund_fee,refund_time=$refund_time where id=$order_id");
			
			$admin_id=$_SESSION['uid'];			//操作管理员id
			$amdin_user=$_SESSION['username'];	//操作管理员账户名
			
			$db->query("update `twotree_order_refund` set status=1,refund_fee=$refund_fee,refund_time=$refund_time,admin_id=$admin_id,admin_user=$admin_user where order_id=$order_id");
			//跳转到退款成功地址;进行其他处理
			header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php?g=Admin&m=Order&a=refund_success&order_id='.$order_id);
			/*echo "业务结果：".$refundResult['result_code']."<br>";
			echo "错误代码：".$refundResult['err_code']."<br>";
			echo "错误代码描述：".$refundResult['err_code_des']."<br>";
			echo "公众账号ID：".$refundResult['appid']."<br>";
			echo "商户号：".$refundResult['mch_id']."<br>";
			echo "子商户号：".$refundResult['sub_mch_id']."<br>";
			echo "设备号：".$refundResult['device_info']."<br>";
			echo "签名：".$refundResult['sign']."<br>";
			echo "微信订单号：".$refundResult['transaction_id']."<br>";
			echo "商户订单号：".$refundResult['out_trade_no']."<br>";
			echo "商户退款单号：".$refundResult['out_refund_no']."<br>";
			echo "微信退款单号：".$refundResult['refund_idrefund_id']."<br>";
			echo "退款渠道：".$refundResult['refund_channel']."<br>";
			echo "退款金额：".$refundResult['refund_fee']."<br>";
			echo "现金券退款金额：".$refundResult['coupon_refund_fee']."<br>";*/
		}
	//==================================/退款=========================================//
	}
/*
	失败返回
	Array
	(
		[return_code] => SUCCESS
		[return_msg] => OK
		[appid] => wx693ca06472124650
		[mch_id] => 1231496602
		[nonce_str] => m3PuweSUl4GiQy2t
		[sign] => 1BEC1DD40C5556FFAB8C1F218BF69098
		[result_code] => FAIL
		[err_code] => REFUND_FEE_INVALID
		[err_code_des] => 退款金额大于支付金额
	)

	return@成功返回

	Array
	(
		[return_code] => SUCCESS
		[return_msg] => OK
		[appid] => wx693ca06472124650
		[mch_id] => 1231496602
		[nonce_str] => 4WcwNUpT5mkSb493
		[sign] => E87BECBB773A9437D797439C5EE14839
		[result_code] => SUCCESS
		[transaction_id] => 1009560888201506240295850334
		[out_trade_no] => 201506141120065990990
		[out_refund_no] => 2015061411200659909901435493106
		[refund_id] => 2009560888201506280012612270
		[refund_channel] => Array
			(
			)
	
		[refund_fee] => 1
		[coupon_refund_fee] => 0
		[total_fee] => 1
		[cash_fee] => 1
		[coupon_refund_count] => 0
		[cash_refund_fee] => 1
	)
	业务结果：SUCCESS
	错误代码：
	错误代码描述：
	公众账号ID：wx693ca06472124650
	商户号：1231496602
	子商户号：
	设备号：
	签名：E87BECBB773A9437D797439C5EE14839
	微信订单号：1009560888201506240295850334
	商户订单号：201506141120065990990
	商户退款单号：2015061411200659909901435493106
	微信退款单号：
	退款渠道：Array
	退款金额：1
	现金券退款金额：0
	
	*/
?>