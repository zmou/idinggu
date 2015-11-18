<?php
/**
	在线充值
*/
	header('content-type:text/html;charset=utf-8');
	//include_once("../WxPayPubHelper/WxPayConf.php");
	include_once("../WxPayPubHelper/WxPayPubHelper.php");
	include_once("../class/db.class.php");
	
	$db=new Connection();
	
	
	if($order_id=$_GET['order_id']){
		$query=$db->query("select * from `twotree_recharge` where id='$order_id'");
		$order=$db->get_one($query);
	}
	
	if(empty($order)){
		header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php?g=Weixin&m=Index&a=index');
	}
	
	$query=$db->query("select * from `twotree_wechat_user` where id={$order['user_id']}");
	$user_info=$db->get_one($query);
	
	//商户信息
	/*$query=$db->query("select * from `twotree_pubchatuser` where id=1");
	$shop_info=$db->get_one($query);
	WxPayConf::$APPID=$shop_info['appid'];
	WxPayConf::$MCHID=$shop_info['partnerid'];
	WxPayConf::$KEY=$shop_info['partnerkey'];
	WxPayConf::$APPSECRET=$shop_info['appsecret'];
	WXPayConf::$NOTIFY_URL = 'http://'.$_SERVER['HTTP_HOST'].'/wxpay/do/recharge_notify.php';*/
	
	//使用jsapi接口
	$jsApi = new JsApi_pub();
	//=========步骤1：网页授权获取用户openid============//
	//通过code获得openid
	/*if(!isset($_GET['code']))
	{
		//触发微信返回code码
		$url = $jsApi->createOauthUrlForCode(urlencode(WxPayConf_pub::JS_API_CALL_URL));
		die($url);
		header("location:".$url); 
	}else
	{
		//获取code码，以获取openid
        $code = $_GET['code'];
		$jsApi->setCode($code);
        $openid = $jsApi->getOpenId();    
	}*/
	$openid=$user_info['wechatid'];	//'oTsQDj2H1unKxNJ0qdXzp4og96aU';
	//=========步骤2：使用统一支付接口，获取prepay_id========//
	//使用统一支付接口
	$unifiedOrder = new UnifiedOrder_pub();
	
	//设置统一支付接口参数
	//设置必填参数
	//appid已填,商户无需重复填写
	//mch_id已填,商户无需重复填写
	//noncestr已填,商户无需重复填写
	//spbill_create_ip已填,商户无需重复填写
	//sign已填,商户无需重复填写
	$unifiedOrder->setParameter("openid",$user_info['wechatid']);
	$unifiedOrder->setParameter("body","在线充值-叮咕商城");//商品描述
	//自定义订单号，此处仅作举例
	$timeStamp = time();
	//$out_trade_no = WxPayConf_pub::APPID."$timeStamp";
	$unifiedOrder->setParameter("out_trade_no",$order['out_trade_no']);	//商户订单号 
	$unifiedOrder->setParameter("total_fee",$order['money']*100);       //总金额(分)25*100
	$unifiedOrder->setParameter("notify_url",'http://'.$_SERVER['HTTP_HOST'].'/wxpay/do/recharge_notify.php');//通知地址 
	$unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
	//非必填参数，商户可根据实际情况选填
	//$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号  
	//$unifiedOrder->setParameter("device_info","XXXX");//设备号 
	//$unifiedOrder->setParameter("attach","XXXX");//附加数据 
	//$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
	//$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间 
	//$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记 
	//$unifiedOrder->setParameter("openid","XXXX");//用户标识
	//$unifiedOrder->setParameter("product_id","XXXX");//商品ID
	$prepay_id = $unifiedOrder->getPrepayId();
	//=========步骤3：使用jsapi调起支付============
	$jsApi->setPrepayId($prepay_id);
	$jsApiParameters = $jsApi->getParameters();
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta content="initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>在线充值</title>
</head>
<body onLoad="callpay();" style="display:none">
        <div id="box">
            <div id='alt'>订单信息</div>
            <div id="content">
                <p>订单编号：<?php echo $order_info['order_sn'];?></p>
                <p>订单金额：&yen;<?php echo $order_info['total_fee'];?></p>
                <p>下单时间：<?php echo date('Y-m-d H:i:s',$order_info['order_time']);?></p>
                <p>微信昵称：<?php echo $user_info['nickname'];?></p>
            </div>
        </div>
	<div align="center">
		<button class="btn" type="button" onClick="callpay()" >确认支付</button>
	</div>
</body>
<style>
    #box{
        box-shadow: 1px 1px 1px 1px #CCC;
        border-radius: 4px;
        margin: 10px 0px;
        padding: 0px;
        text-align: left;
    }
    #alt{
        background: #27AE16;
        border-radius: 3px;
        padding: 10px;
        color: white;
        font-size: 15px;
    }
    #content{
        padding: 10px;
        line-height: 22px;
    }
    .btn{
        padding: 10px;
        width:100%;
        background-color:#27AE16; 
        border:0px #27AE16 solid; 
        cursor: pointer;  
        color:white;  
        font-size:16px;
        border-radius: 5px;
    }
</style>
<script type="text/javascript">
	var order_id="<?php echo $order_id;?>";
	var domain="<?php echo $_SERVER['HTTP_HOST'];?>";
	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				 // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。 
				 //get_brand_wcpay_request:ok
				//alert(res.err_code+res.err_desc+res.err_msg);return;
				if(res.err_msg=="get_brand_wcpay_request:ok") {
					//支付成功，跳转至支付成功页面
					var success_url="http://"+domain+"/index.php?g=Weixin&m=Index&a=recharge_success&order_id="+order_id;
					location.href=success_url;		 
				}else{
					//alert(res.err_code+res.err_desc+res.err_msg);
					var fail_url="http://"+domain+"/index.php?g=Weixin&m=Ucenter&a=index";
					location.href=fail_url;	
				}
				
			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
			if( document.addEventListener ){
				document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
			}else if (document.attachEvent){
				document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
				document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
			}
		}else{
			jsApiCall();
		}
	}
</script>
</html>