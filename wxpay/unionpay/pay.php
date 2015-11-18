<?php
$unionPay = new UnionPay();
$unionPay->config = Yii::$app->params['unionpay'];//上面的配置
$unionPay->params = array(
    'version' => '5.0.0', //版本号
    'encoding' => 'UTF-8', //编码方式
    'certId' => $unionPay->getSignCertId(), //证书ID
    'signature' => '', //签名
    'signMethod' => '01', //签名方式
    'txnType' => '01', //交易类型
    'txnSubType' => '01', //交易子类
    'bizType' => '000201', //产品类型
    'channelType' => '08',//渠道类型
    'frontUrl' => Url::toRoute(['payment/unionpayreturn'], true), //前台通知地址
    'backUrl' => Url::toRoute(['payment/unionpaynotify'], true), //后台通知地址
    //'frontFailUrl' => Url::toRoute(['payment/unionpayfail'], true), //失败交易前台跳转地址
    'accessType' => '0', //接入类型
    'merId' => '', //商户代码
    'orderId' => $orderNo, //商户订单号
    'txnTime' => date('YmdHis'), //订单发送时间
    'txnAmt' => $sum * 100, //交易金额，单位分
    'currencyCode' => '156', //交易币种
);
$html = $unionPay->createPostForm();
?>