<?php
/**
 * ͨ��֪ͨ�ӿ�
 * ====================================================
 * ֧����ɺ�΢�Ż�����֧�����û���Ϣ���͵��̻��趨��֪ͨURL��
 * �̻����ջص���Ϣ�󣬸�����Ҫ�趨��Ӧ�Ĵ������̡�
 * 
 * �������ʹ��log�ļ���ʽ��¼�ص���Ϣ��
 */
include_once("./log_.php");
include_once("../WxPayPubHelper/WxPayPubHelper.php");
include_once("../class/db.class.php");

// ����΢��JSSDK
include_once("../class/Wxjssdk.class.php");

//ʹ��ͨ��֪ͨ�ӿ�
$notify = new Notify_pub();

//�洢΢�ŵĻص�
$xml = $GLOBALS['HTTP_RAW_POST_DATA'];

$notify->saveData($xml);

//��֤ǩ��������Ӧ΢�š�
//�Ժ�̨֪ͨ����ʱ�����΢���յ��̻���Ӧ���ǳɹ���ʱ��΢����Ϊ֪ͨʧ�ܣ�
//΢�Ż�ͨ��һ���Ĳ��ԣ���30���ӹ�8�Σ��������·���֪ͨ��
//���������֪ͨ�ĳɹ��ʣ���΢�Ų���֤֪ͨ�����ܳɹ���
if ($notify->checkSign() == FALSE) {
    $notify->setReturnParameter("return_code", "FAIL"); //����״̬��
    $notify->setReturnParameter("return_msg", "ǩ��ʧ��"); //������Ϣ
} else {
    $notify->setReturnParameter("return_code", "SUCCESS"); //���÷�����
}
$returnXml = $notify->returnXml();
echo $returnXml;

//==�̻�����ʵ�����������Ӧ�Ĵ�������==//

//====================================���¶���״̬==================================//
$obj            = (array) simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
$result_code    = $obj['result_code']; //�ɹ� SUCCESS
$return_code    = $obj['return_code']; //�ɹ� SUCCESS
$out_trade_no   = $obj['out_trade_no']; //������	substr($obj['out_trade_no'],0,-4);
$transaction_id = $obj['transaction_id']; //΢��֧����ˮ��
$total_fee      = ($obj['total_fee']) * 0.01; //֧�����
$openid         = $obj['openid']; //֧����΢��openid
$timestamp      = time();

if ($result_code == 'SUCCESS' && $return_code == 'SUCCESS') {
    
    $db = new Connection(); //�������ݿ�����
    
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
            
            // ���¿��
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
            /************************************���¿��end*********************************/
            
            $query = $db->query("select * from `twotree_shop` where id={$order_info['shop_id']}");
            $shop  = $db->get_one($query);
            //file_put_contents('pay'.date('YmdHis').'-12.txt',$shop_keeper['mobile'].'\n');
            
            $query       = $db->query("select * from `twotree_wechat_user` where id={$shop['uid']}");
            $shop_keeper = $db->get_one($query);
            
            //file_put_contents('pay'.date('YmdHis').'-13.txt',$shop_keeper['mobile'].'\n');
            
            $query     = $db->query("select * from `twotree_wechat_user` where id={$order_info['user_id']}");
            $user_info = $db->get_one($query);
            
			// ���Ͷ��Ÿ��곤
            if ($shop_keeper['mobile']) {
                $sms_content = "���������ף����������������Һţ�" . $order_info['address'] . "����ϵ��������" . $user_info['name'] . "���绰��" . $order_info['mobile'] . ";�Ͻ��鿴���Ĵ����Ͷ������룬5�����ھ�������С���ɡ�";
                
                send_sms($shop_keeper['mobile'], $sms_content);
            }
            
            /***********************************����΢��ģ����Ϣ**********************************/
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
						"value":"�ף������¶�����������~~",
						"color":"#173177"
					},
					"tradeDateTime":{
						"value":"' . date("Y-m-d H:i:s", $order_info['order_time']) . '",
						"color":"#173177"
					},
					"orderType": {
						"value":"������",
						"color":"#173177"
					},
					"customerInfo":{
						"value":"���Һţ�' . $order_info['address'] . ",������" . $user_info['name'] . ",�绰��" . $order_info['mobile'] . '",
						"color":"#173177"
					},
					"orderItemName":{
						"value":"��������",
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
            /************************************΢��ģ����Ϣend****************************************/
            
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
            $sms_content = "���������ף����������������Һţ�" . $order_info['address'] . "����ϵ��������" . $user_info['name'] . "���绰��" . $order_info['mobile'] . ";�Ͻ��鿴���Ĵ����Ͷ������룬5�����ھ�������С���ɡ�";
            
            $res         = send_sms($shop_keeper['mobile'], $sms_content);
        }
		
		/***********************************����΢��ģ����Ϣ**********************************/
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
					"value":"�ף������¶�����������~~",
					"color":"#173177"
				},
				"tradeDateTime":{
					"value":"' . date("Y-m-d H:i:s", $order_info['order_time']) . '",
					"color":"#173177"
				},
				"orderType": {
					"value":"�Լ���",
					"color":"#173177"
				},
				"customerInfo":{
					"value":"���Һţ�' . $order_info['address'] . ",������" . $user_info['name'] . ",�绰��" . $order_info['mobile'] . '",
					"color":"#173177"
				},
				"orderItemName":{
					"value":"��������",
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
		/************************************΢��ģ����Ϣend****************************************/
        
    }
    
    if ($order_info['role_id'] == 2) {
        if ($order_info['mobile']) {
            $sms_content = "����������ϲ�������ɹ���������������Ĳ��������鿴������ȷ���ջ���������Ʒ��ͬ��չʾ�����ĵ��档";
            //$res = send_sms($order_info['mobile'],$sms_content);
        }
    }
}
//====================================���¶���״̬==================================//

//��log�ļ���ʽ��¼�ص���Ϣ
$log_     = new Log_();
$log_name = "./notify_url_" . date('Ymd', time()) . ".log"; //log�ļ�·��
$log_->log_result($log_name, $sql . "��Recieve NOtice��:\n" . $xml . "\n");

if ($notify->checkSign() == TRUE) {
    if ($notify->data["return_code"] == "FAIL") {
        //�˴�Ӧ�ø���һ�¶���״̬���̻�������ɾ����
        $log_->log_result($log_name, "��ͨ�ų���:\n" . $xml . "\n");
    } elseif ($notify->data["result_code"] == "FAIL") {
        //�˴�Ӧ�ø���һ�¶���״̬���̻�������ɾ����
        $log_->log_result($log_name, "��ҵ�����:\n" . $xml . "\n");
    } else {
        //�˴�Ӧ�ø���һ�¶���״̬���̻�������ɾ����
        
        
        
        $log_->log_result($log_name, "��Pay Success��:\n" . $xml . "\n" . $sql);
        
        
    }
    
    //�̻��������Ӵ�������,
    //���磺���¶���״̬
    //���磺���ݿ����
    //���磺����֧�������Ϣ
}


function send_sms($mobile, $content)
{
    $cust_code                = '001025'; //�˺�
    $password                 = 'CXITIV9MLF'; //����
    $sp_code                  = '106904561025'; //��չ��
    $content                  = $content; //��������
    $destMobiles              = $mobile; //�ֻ����룬ʹ�ö��Ÿ������Է��Ͷ������
    $url                      = 'http://120.26.220.72:8860/'; //URL��ַ
    $post_data                = array();
    $post_data['cust_code']   = $cust_code;
    $post_data['destMobiles'] = $destMobiles;
    $post_data['content']     = mb_convert_encoding($content, 'utf-8', 'gb2312');
    $post_data['sign']        = md5(urlencode(mb_convert_encoding($content, 'utf-8', 'gb2312') . $password)); //ǩ��
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
    //Ϊ��֧��cookie
    curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    $result = curl_exec($ch);
    
    return $result;
}

// ����http����
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
    
    // post����
    if (!is_null($postData)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    }
    
    $content = curl_exec($ch);
    curl_close($ch);
    
    return $content;
}
