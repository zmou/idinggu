<?php
/* *
 * 功能：即时到账批量退款有密接口接入页
 * 版本：3.3
 * 修改日期：2012-07-23
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
 * 该代码仅供学习和研究支付宝接口使用，只是提供一个参考。

 *************************注意*************************
 * 如果您在接口集成过程中遇到问题，可以按照下面的途径来解决
 * 1、商户服务中心（https://b.alipay.com/support/helperApply.htm?action=consultationApply），提交申请集成协助，我们会有专业的技术工程师主动联系您协助解决
 * 2、商户帮助中心（http://help.alipay.com/support/232511-16307/0-16307.htm?sh=Y&info_type=9）
 * 3、支付宝论坛（http://club.alipay.com/read-htm-tid-8681712.html）
 * 如果不想使用扩展功能请把扩展功能参数赋空值。
 */
header("content-type:text/html;charset=utf-8");
include_once("../class/db.class.php");
require_once("alipay.config.php");
require_once("lib/alipay_submit.class.php");

/**************************请求参数**************************/
if($_POST){
		$order_id=$_POST['order_id'];			//订单号
		$refund_fee=$_POST['refund_fee'];		//退款金额
		
		$db=new Connection();
		$query=$db->query("select * from `twotree_order_info` where id=$order_id");
		$order=$db->get_one($query);
		
		$trade_no=$order['trade_no'];			//支付宝交易单号
		
        //服务器异步通知页面路径
        $notify_url = "http://".$_SERVER['HTTP_HOST']."/wxpay/alipay_refund/notify_url.php";
        //需http://格式的完整路径，不允许加?id=123这类自定义参数

        //卖家支付宝帐户
        $seller_email = $alipay_config['seller_email'];
        //必填

        //退款当天日期
        $refund_date = date('Y-m-d H:i:s',time());
        //必填，格式：年[4位]-月[2位]-日[2位] 小时[2位 24小时制]:分[2位]:秒[2位]，如：2007-10-01 13:13:13

        //批次号
        $batch_no = date('Ymd').rand(1111,9999);
        //必填，格式：当天日期[8位]+序列号[3至24位]，如：201008010000001

        //退款笔数
        $batch_num = 1;
        //必填，参数detail_data的值中，“#”字符出现的数量加1，最大支持1000笔（即“#”字符出现的数量999个）

        //退款详细数据
        $detail_data = $trade_no."^".$_POST['refund_fee']."^协商退款";
        //必填，具体格式请参见接口技术文档


/************************************************************/

//构造要请求的参数数组，无需改动
$parameter = array(
		"service" => "refund_fastpay_by_platform_pwd",
		"partner" => trim($alipay_config['partner']),
		"notify_url"	=> $notify_url,
		"seller_email"	=> $seller_email,
		"refund_date"	=> $refund_date,
		"batch_no"	=> $batch_no,
		"batch_num"	=> $batch_num,
		"detail_data"	=> $detail_data,
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
);
//var_dump($detail_data);die();
//建立请求
$alipaySubmit = new AlipaySubmit($alipay_config);
$html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
echo $html_text;
}
?>