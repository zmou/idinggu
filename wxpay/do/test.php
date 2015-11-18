<?php
/**
 * JS_API支付
 * ====================================================
 * 在微信浏览器里面打开H5网页中执行JS调起支付。接口输入输出数据格式为JSON。
 * 成功调起支付需要三个步骤：
 * 步骤1：网页授权获取用户openid
 * 步骤2：使用统一支付接口，获取prepay_id
 * 步骤3：使用jsapi调起支付
*/
	include_once("../WxPayPubHelper/WxPayPubHelper.php");
	include_once("../class/db.class.php");
	header('content-type:text/html;charset=utf-8');
	$db=new Connection();

	$order_id = intval($_GET['order_id']);
		$query=$db->query("select * from `twotree_order_info` where id=$order_id");
		$order_info=$db->get_one($query);

		//update shop goods store_num
		$order_id = $order_info['id'];
		$shop_id = $order_info['shop_id'];
		$sql = "select goods_id, goods_nums from twotree_order_goods where order_id=$order_id";
		$order_goods = $db->get_all($sql);
		//var_dump($order_goods);
		$sql_str = '';
		foreach($order_goods as $goods)
		{
			$gn = intval($goods['goods_nums']);
			$sql = "update twotree_shop_goods set store_num=store_num-$gn where shop_id=$shop_id and goods_id=".$goods['goods_id'];
			$db->query($sql);
			$sql_str .= $sql.'<br>';
		}
		echo $sql_str;exit;
		//file_put_contents('pay'.date('YmdHis').'-test_store.txt',$shop_keeper['mobile'].'\n');



    //================获取订单信息====================//
	if($order_id=$_GET['order_id']){

/*
		$query=$db->query("select * from `twotree_order_info` where id=$order_id");
		$order_info=$db->get_one($query);

		$query=$db->query("select * from `twotree_wechat_user` where id={$order_info['user_id']}");
		$user_info=$db->get_one($query);

		$query=$db->query("select * from `twotree_shop` where id={$order_info['shop_id']}");
		$shop=$db->get_one($query);

		$query=$db->query("select * from `twotree_wechat_user` where id={$shop['uid']}");		
		$shop_keeper=$db->get_one($query);

		if($shop_keeper['mobile'])
		{
			$sms_content = "【叮咕】亲，订单来啦！待配送商品：".$order_info['order_title'].";  送货地址：".$order_info['build']."-".$order_info['address']." 联系人姓名：".$user_info['name']."电话：".$user_info['mobile'];
		}
		echo $sms_content;
		//file_put_contents('pay'.date('YmdHis').'.txt',$sql.'\n'.$shop_keeper['mobile']);


 */



	}
?>
