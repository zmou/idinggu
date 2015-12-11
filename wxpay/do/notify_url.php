<?php
/**
 * 通用通知接口
 * ====================================================
 * 支付完成后，微信会把相关支付和用户信息发送到商户设定的通知URL，
 * 商户接收回调信息后，根据需要设定相应的处理流程。
 * 
 * 这里举例使用log文件形式记录回调信息。
 */
include_once("./log_.php");
include_once("../WxPayPubHelper/WxPayPubHelper.php");
include_once("../class/db.class.php");

// 引入微信JSSDK
include_once("../class/Wxjssdk.class.php");

//使用通用通知接口
$notify = new Notify_pub();

//存储微信的回调
$xml = $GLOBALS['HTTP_RAW_POST_DATA'];

$notify->saveData($xml);

//验证签名，并回应微信。
//对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
//微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
//尽可能提高通知的成功率，但微信不保证通知最终能成功。
if ($notify->checkSign() == FALSE) {
    $notify->setReturnParameter("return_code", "FAIL"); //返回状态码
    $notify->setReturnParameter("return_msg", "签名失败"); //返回信息
} else {
    $notify->setReturnParameter("return_code", "SUCCESS"); //设置返回码
}
$returnXml = $notify->returnXml();
echo $returnXml;

//==商户根据实际情况设置相应的处理流程==//

//====================================更新订单状态==================================//
$obj            = (array) simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
$result_code    = $obj['result_code']; //成功 SUCCESS
$return_code    = $obj['return_code']; //成功 SUCCESS
$out_trade_no   = $obj['out_trade_no']; //订单号	substr($obj['out_trade_no'],0,-4);
$transaction_id = $obj['transaction_id']; //微信支付流水号
$total_fee      = ($obj['total_fee']) * 0.01; //支付金额
$openid         = $obj['openid']; //支付者微信openid
$timestamp      = time();

if ($result_code == 'SUCCESS' && $return_code == 'SUCCESS') {
    
    $db = new Connection(); //创建数据库链接
    
    //check is friend pay or mine
    $trade_no_arr = explode("_", $out_trade_no);
    if (count($trade_no_arr) > 1) {
        //friend pay
        $out_trade_no  = $trade_no_arr[0];
        $friend_pay_id = $trade_no_arr[1];
        $sql           = "update twotree_order_friend_pay set pay_status=1, pay_time=$timestamp, out_trade_no='$out_trade_no' where id=$friend_pay_id";
        $db->query($sql);
        
        //check order of completed or not
        $query      = $db->query("select * from `twotree_order_info` where order_sn='$out_trade_no'");
        $order_info = $db->get_one($query);
        
        $query      = $db->query("select SUM(pay_money) as payed_money from `twotree_order_friend_pay` where order_id=" . $order_info['id']);
        $friend_pay = $db->get_one($query);
        
        if ($friend_pay['payed_money'] >= $order_info['total_fee']) {
            $sql = "update twotree_order_info set pay_status=1, pay_time=$timestamp,out_trade_no='$out_trade_no' where order_sn='$out_trade_no'";
            $db->query($sql);
            
            // 更新库存
            //update shop goods store_num
            $order_id    = $order_info['id'];
            $shop_id     = $order_info['shop_id'];
            $sql         = "select goods_id, goods_nums from twotree_order_goods where order_id=$order_id";
            $order_goods = $db->get_all($sql);
            //var_dump($order_goods);
            $sql_str     = '';
            foreach ($order_goods as $goods) {
                $gn  = intval($goods['goods_nums']);
                $sql = "update twotree_shop_goods set store_num=store_num-$gn where shop_id=$shop_id and goods_id=" . $goods['goods_id'];
                $db->query($sql);
                $sql_str .= $sql . '<br>';
            }
            /************************************更新库存end*********************************/
            
            $query = $db->query("select * from `twotree_shop` where id={$order_info['shop_id']}");
            $shop  = $db->get_one($query);
            //file_put_contents('pay'.date('YmdHis').'-12.txt',$shop_keeper['mobile'].'\n');
            
            $query       = $db->query("select * from `twotree_wechat_user` where id={$shop['uid']}");
            $shop_keeper = $db->get_one($query);
            
            //file_put_contents('pay'.date('YmdHis').'-13.txt',$shop_keeper['mobile'].'\n');
            
            $query     = $db->query("select * from `twotree_wechat_user` where id={$order_info['user_id']}");
            $user_info = $db->get_one($query);
            
			// 发送短信给店长
            if ($shop_keeper['mobile']) {
                $sms_content = "【叮咕】亲，又来订单啦！寝室号：" . $order_info['address'] . "，联系人姓名：" . $user_info['name'] . "，电话：" . $order_info['mobile'] . ";赶紧查看您的待配送订单详请，5分钟内惊呆您的小伙伴吧～";
                
                send_sms($shop_keeper['mobile'], $sms_content);
            }
            
            /***********************************发送微信模板消息**********************************/
            $query        = $db->query("SELECT * FROM `twotree_wechat_config`");
            $wechatConfig = $db->get_one($query);
            $Wxjssdk      = new Wxjssdk($wechatConfig['appid'], $wechatConfig['appsecret']);
            $msgurl       = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
            
            $msgData = '{
				"touser":"' . $shop_keeper['wechatid'] . '",
				"template_id":"kzNDUqBXTDI7rrFxY-JvrHmlXygkQM7w16Q6SharRoY",
				"url":"http://m.idinggu.com/index.php?m=Ucenter&a=order_list&pay_status=0&order_style=2",
				"topcolor":"#FF0000",
				"data":{
					"first": {
						"value":"亲！又来新订单啦，走起~~",
						"color":"#173177"
					},
					"tradeDateTime":{
						"value":"' . date("Y-m-d H:i:s", $order_info['order_time']) . '",
						"color":"#173177"
					},
					"orderType": {
						"value":"朋友请",
						"color":"#173177"
					},
					"customerInfo":{
						"value":"寝室号：' . $order_info['address'] . ",姓名：" . $user_info['name'] . ",电话：" . $order_info['mobile'] . '",
						"color":"#173177"
					},
					"orderItemName":{
						"value":"订单描述",
						"color":"#173177"
					},
					"orderItemData":{
						"value":"' . $order_info['order_title'] . '",
						"color":"#173177"
					},
					"remark":{
						"value":"' . $order_info['remark'] . '",
						"color":"#173177"
					}
				}

			}';
            
            $res = http_request($url, $msgData);
			file_put_contents("test.txt",$res);
            /************************************微信模板消息end****************************************/
            
        }
        
        exit;
    }
    
    $query      = $db->query("select * from `twotree_order_info` where order_sn='$out_trade_no'");
    $order_info = $db->get_one($query);
    
    //$db->query("update wx_order set is_pay=1,pay_time=$timestamp where code=$out_trade_no");
    $sql = "update twotree_order_info set pay_status=1,pay_money=$total_fee,pay_time=$timestamp,out_trade_no='$out_trade_no', transaction_id='$transaction_id' where order_sn='$out_trade_no'";
    
    $res = $db->query($sql);
    
    if ($order_info['role_id'] == 1 && $order_info['order_style'] == 1) {
        $query     = $db->query("select * from `twotree_wechat_user` where id={$order_info['user_id']}");
        $user_info = $db->get_one($query);
        
        $query = $db->query("select * from `twotree_shop` where id={$order_info['shop_id']}");
        $shop  = $db->get_one($query);
        
        $query       = $db->query("select * from `twotree_wechat_user` where id={$shop['uid']}");
        $shop_keeper = $db->get_one($query);
        
        //update shop goods store_num
        $order_id    = $order_info['id'];
        $shop_id     = $order_info['shop_id'];
        $sql         = "select goods_id, goods_nums from twotree_order_goods where order_id=$order_id";
        $order_goods = $db->get_all($sql);
        
        $sql_str     = '';
        foreach ($order_goods as $goods) {
            $gn  = intval($goods['goods_nums']);
            $sql = "update twotree_shop_goods set store_num=store_num-$gn where shop_id=$shop_id and goods_id=" . $goods['goods_id'];
            $db->query($sql);
            $sql_str .= $sql . '<br>';
        }
        
        if ($shop_keeper['mobile']) {
            $sms_content = "【叮咕】亲，又来订单啦！寝室号：" . $order_info['address'] . "，联系人姓名：" . $user_info['name'] . "，电话：" . $order_info['mobile'] . ";赶紧查看您的待配送订单详请，5分钟内惊呆您的小伙伴吧～";
            
            $res         = send_sms($shop_keeper['mobile'], $sms_content);
        }
		
		/***********************************发送微信模板消息**********************************/
		$query        = $db->query("SELECT * FROM `twotree_wechat_config`");
		$wechatConfig = $db->get_one($query);
		$Wxjssdk      = new Wxjssdk($wechatConfig['appid'], $wechatConfig['appsecret']);
		$msgurl       = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=$accessToken";
		
		$msgData = '{
			"touser":"' . $shop_keeper['wechatid'] . '",
			"template_id":"kzNDUqBXTDI7rrFxY-JvrHmlXygkQM7w16Q6SharRoY",
			"url":"http://m.idinggu.com/index.php?m=Ucenter&a=order_list&pay_status=0",
			"topcolor":"#FF0000",
			"data":{
				"first": {
					"value":"亲！又来新订单啦，走起~~",
					"color":"#173177"
				},
				"tradeDateTime":{
					"value":"' . date("Y-m-d H:i:s", $order_info['order_time']) . '",
					"color":"#173177"
				},
				"orderType": {
					"value":"自己买",
					"color":"#173177"
				},
				"customerInfo":{
					"value":"寝室号：' . $order_info['address'] . ",姓名：" . $user_info['name'] . ",电话：" . $order_info['mobile'] . '",
					"color":"#173177"
				},
				"orderItemName":{
					"value":"订单描述",
					"color":"#173177"
				},
				"orderItemData":{
					"value":"' . $order_info['order_title'] . '",
					"color":"#173177"
				},
				"remark":{
					"value":"' . $order_info['remark'] . '",
					"color":"#173177"
				}
			}

		}';
		
		$res = http_request($url, $msgData);
		file_put_contents("test.txt",$res);
		/************************************微信模板消息end****************************************/
        
    }
    
    if ($order_info['role_id'] == 2) {
        if ($order_info['mobile']) {
            $sms_content = "【叮咕】恭喜您补货成功，详情请进入您的补货订单查看管理，待确认收货后，所补商品会同步展示在您的店面。";
            //$res = send_sms($order_info['mobile'],$sms_content);
        }
    }
}
//====================================更新订单状态==================================//

//以log文件形式记录回调信息
$log_     = new Log_();
$log_name = "./notify_url_" . date('Ymd', time()) . ".log"; //log文件路径
$log_->log_result($log_name, $sql . "【Recieve NOtice】:\n" . $xml . "\n");

if ($notify->checkSign() == TRUE) {
    if ($notify->data["return_code"] == "FAIL") {
        //此处应该更新一下订单状态，商户自行增删操作
        $log_->log_result($log_name, "【通信出错】:\n" . $xml . "\n");
    } elseif ($notify->data["result_code"] == "FAIL") {
        //此处应该更新一下订单状态，商户自行增删操作
        $log_->log_result($log_name, "【业务出错】:\n" . $xml . "\n");
    } else {
        //此处应该更新一下订单状态，商户自行增删操作
        
        
        
        $log_->log_result($log_name, "【Pay Success】:\n" . $xml . "\n" . $sql);
        
        
    }
    
    //商户自行增加处理流程,
    //例如：更新订单状态
    //例如：数据库操作
    //例如：推送支付完成信息
}


function send_sms($mobile, $content)
{
    $cust_code                = '001025'; //账号
    $password                 = 'CXITIV9MLF'; //密码
    $sp_code                  = '106904561025'; //扩展码
    $content                  = $content; //发送内容
    $destMobiles              = $mobile; //手机号码，使用逗号隔开可以发送多个号码
    $url                      = 'http://120.26.220.72:8860/'; //URL地址
    $post_data                = array();
    $post_data['cust_code']   = $cust_code;
    $post_data['destMobiles'] = $destMobiles;
    $post_data['content']     = mb_convert_encoding($content, 'utf-8', 'gb2312');
    $post_data['sign']        = md5(urlencode(mb_convert_encoding($content, 'utf-8', 'gb2312') . $password)); //签名
    $post_data['sp_code']     = $sp_code;
    $o                        = "";
    foreach ($post_data as $k => $v) {
        if ($k == 'content')
            $o .= "$k=" . urlencode($v) . "&";
        else
            $o .= "$k=" . ($v) . "&";
    }
    $post_data = substr($o, 0, -1);
    $ch        = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_URL, $url);
    //为了支持cookie
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $result = curl_exec($ch);
    
    return $result;
}

// 发送http请求
function http_request($url, $postData = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    
    // post请求
    if (!is_null($postData)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    }
    
    $content = curl_exec($ch);
    curl_close($ch);
    
    return $content;
}
