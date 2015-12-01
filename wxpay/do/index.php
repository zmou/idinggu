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
    //================获取订单信息====================//
	if($order_id=$_GET['order_id']){
		$db=new Connection();
		$query=$db->query("select * from `twotree_order_info` where id=$order_id");
		$order_info=$db->get_one($query);
		$query=$db->query("select * from `twotree_wechat_user` where id={$order_info['user_id']}");
		$user_info=$db->get_one($query);
	}

	//check friend pay or self

	$order_info['pay_money'] = floatval($_GET['pay_money']);
	$friend_pay_id = intval($_GET['friend_pay_id']);
	if($friend_pay_id)
	{
		$order_info['total_fee'] = $order_info['pay_money'];
	}

	if($order_info['pay_status']==1||$order_info['total_fee']==0){
		echo '1';
		//header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php?g=Weixin&m=Ucenter&a=order_detail&order_id='.$order_id);
	}
	//如果待支付金额==0,修改订单状态为已支付
	if($order_info['total_fee']==0){
		echo '2';
		//$db->query("update `twotree_wechat_user` set pay_status=1 where id={$order_info['id']}");
		header('location:http://'.$_SERVER['HTTP_HOST'].'/index.php?g=Weixin&m=Ucenter&a=order_detail&order_id='.$order_id);
	}


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

	//friend openid
	if($friend_pay_id)
	{
		$openid = $_GET['friend_openid'];
	}

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
	$unifiedOrder->setParameter("openid","$openid");//商品描述
	$order_title = $order_info['order_title'] ? $order_info['order_title'] : '叮咕';
	$unifiedOrder->setParameter("body",$order_title);//商品描述
	//自定义订单号，此处仅作举例
	$timeStamp = time();
	//$out_trade_no = WxPayConf_pub::APPID."$timeStamp";

	$out_trade_no=$order_info['order_sn'];					//订单号	.substr($timeStamp,-4)
	if($friend_pay_id)
	{
		$out_trade_no = $order_info['order_sn'].'_'.$friend_pay_id;
	}

	$unifiedOrder->setParameter("out_trade_no","$out_trade_no");//商户订单号 

	$unifiedOrder->setParameter("total_fee",$order_info['total_fee']*100);       //总金额(分)25*100
	$unifiedOrder->setParameter("notify_url",'http://'.$_SERVER['HTTP_HOST'].'/wxpay/do/notify_url.php');//通知地址 
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
	
	//var_dump($order_info);
	$prepay_id = $unifiedOrder->getPrepayId();
	//echo '<br>'.$prepay_id.'fdsd';exit;
	//=========步骤3：使用jsapi调起支付============
	$jsApi->setPrepayId($prepay_id);
	$jsApiParameters = $jsApi->getParameters();
	$domain=$_SERVER['HTTP_HOST'];
	
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta content="initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>在线支付</title>
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
	var order_sn = "<?php echo $order_info['order_sn'];?>";
	var role_id = "<?php echo $order_info['role_id'];?>";
	var order_style = "<?php echo $order_info['order_style'];?>";
	var friend_pay_id = "<?php echo $friend_pay_id;?>";
	var domain="<?php echo $domain;?>";
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
				if(res.err_msg=="get_brand_wcpay_request:ok") {
					//支付成功，跳转至支付成功页面
					var success_url="http://"+domain+"/index.php?g=Weixin&m=Ucenter&a=order_detail&id="+order_id;

					if(order_style == 2)
					{
						var success_url="http://m.idinggu.com/index.php?m=Index&a=friend_ing&order_sn="+order_sn;
					}
					if(role_id == '2')
					{
						alert("恭喜您补货成功，详情请进入您的补货订单查看管理，待确认收货后，所补商品会同步展示在您的店面。");
					}

					location.href=success_url;		 
				}else{
					//alert(res.err_code+res.err_desc+res.err_msg);
					if(friend_pay_id)
					{
						var fail_url="http://m.idinggu.com/index.php?m=index&a=friend_ing&order_sn="+order_sn;
					}
					else
					{
						var fail_url="http://"+domain+"/index.php?g=Weixin&m=Ucenter&a=order_detail&id="+order_id;
					}

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
