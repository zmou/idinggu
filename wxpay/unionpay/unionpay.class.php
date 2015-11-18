<?php
class UnionPay
{
    /**
     * 支付配置
     * @var array
     */
    public $config;
    /**
     * 支付参数，提交到银联对应接口的所有参数
     * @var array
     */
    public $params;
    /**
     * 自动提交表单模板
     * @var string
     */
    private $formTemplate = <<<'HTML'
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>支付</title>
</head>
<body>
    <div style="text-align:center">跳转中...</div>
    <form id="pay_form" name="pay_form" action="%s" method="post">
        %s
    </form>
    <script type="text/javascript">
        document.onreadystatechange = function(){
            if(document.readyState == "complete") {
                document.pay_form.submit();
            }
        };
    </script>
</body>
</html>
HTML;
/**
* 构建自动提交HTML表单
* @return string
*/
public function createPostForm()
{
        $this->params['signature'] = $this->sign();
        $input = '';
        foreach($this->params as $key => $item) {
            $input .= "\t\t<input type=\"hidden\" name=\"{$key}\" value=\"{$item}\">\n";
        }
        return sprintf($this->formTemplate, $this->config['frontUrl'], $input);
}
/**
* 验证签名
* 验签规则：
* 除signature域之外的所有项目都必须参加验签
* 根据key值按照字典排序，然后用&拼接key=value形式待验签字符串；
* 然后对待验签字符串使用sha1算法做摘要；
* 用银联公钥对摘要和签名信息做验签操作
* 
* @throws \Exception
* @return bool
*/
public function verifySign()
{
        $publicKey = $this->getVerifyPublicKey();
        $verifyArr = $this->filterBeforSign();
        ksort($verifyArr);
        $verifyStr = $this->arrayToString($verifyArr);
        $verifySha1 = sha1($verifyStr);
        $signature = base64_decode($this->params['signature']);
        $result = openssl_verify($verifySha1, $signature, $publicKey);
        if($result === -1) {
            throw new \Exception('Verify Error:'.openssl_error_string());
        }
        return $result === 1 ? true : false;
}
/**
* 取签名证书ID(SN)
* @return string
*/
public function getSignCertId()
{
        return $this->getCertIdPfx($this->config['signCertPath']);
}   
/**
* 签名数据
* 签名规则:
* 除signature域之外的所有项目都必须参加签名
* 根据key值按照字典排序，然后用&拼接key=value形式待签名字符串；
* 然后对待签名字符串使用sha1算法做摘要；
* 用银联颁发的私钥对摘要做RSA签名操作
* 签名结果用base64编码后放在signature域
* 
* @throws \InvalidArgumentException
* @return multitype|string
*/
private function sign() {
        $signData = $this->filterBeforSign();
        ksort($signData);
        $signQueryString = $this->arrayToString($signData);
        if($this->params['signMethod'] == 01) {
            //签名之前先用sha1处理
            //echo $signQueryString;exit;
            $datasha1 = sha1($signQueryString);
            $signed = $this->rsaSign($datasha1);
        } else {
            throw new \InvalidArgumentException('Nonsupport Sign Method');
        }
        return $signed;
}
/**
* 数组转换成字符串
* @param array $arr
* @return string
*/
private function arrayToString($arr)
{
        $str = '';
        foreach($arr as $key => $value) {
            $str .= $key.'='.$value.'&';
        }
        return substr($str, 0, strlen($str) - 1);
}
/**
* 过滤待签名数据
* signature域不参加签名
* 
* @return array
*/
private function filterBeforSign()
{
        $tmp = $this->params;
        unset($tmp['signature']);
        return $tmp;
}
/**
* RSA签名数据，并base64编码
* @param string $data 待签名数据
* @return mixed
*/
private function rsaSign($data)
{
        $privatekey = $this->getSignPrivateKey();
        $result = openssl_sign($data, $signature, $privatekey);
        if($result) {
            return base64_encode($signature);
        }
        return false;
}
/**
* 取.pfx格式证书ID(SN)
* @return string
*/
private function getCertIdPfx($path)
{
        $pkcs12certdata = file_get_contents($path);
        openssl_pkcs12_read($pkcs12certdata, $certs, $this->config['signCertPwd']);
        $x509data = $certs['cert'];
        openssl_x509_read($x509data);
        $certdata = openssl_x509_parse($x509data);
        return $certdata['serialNumber'];
}
/**
* 取.cer格式证书ID(SN)
* @return string
*/
private function getCertIdCer($path)
{
        $x509data = file_get_contents($path);
        openssl_x509_read($x509data);
        $certdata = openssl_x509_parse($x509data);
        return $certdata['serialNumber'];
}
/**
* 取签名证书私钥
* @return resource
*/
private function getSignPrivateKey()
{
        $pkcs12 = file_get_contents($this->config['signCertPath']);
        openssl_pkcs12_read($pkcs12, $certs, $this->config['signCertPwd']);
        return $certs['pkey'];
}
/**
* 取验证签名证书
* @throws \InvalidArgumentException
* @return string
*/
private function getVerifyPublicKey()
{
        //先判断配置的验签证书是否银联返回指定的证书是否一致
        if($this->getCertIdCer($this->config['verifyCertPath']) != $this->params['certId']) {
            throw new \InvalidArgumentException('Verify sign cert is incorrect');
        }
        return file_get_contents($this->config['verifyCertPath']);       
    }
}

//银联支付设置
 'unionpay' => [
     //测试环境参数
     'frontUrl' => 'https://101.231.204.80:5000/gateway/api/frontTransReq.do', //前台交易请求地址
     //'singleQueryUrl' => 'https://101.231.204.80:5000/gateway/api/queryTrans.do', //单笔查询请求地址
     'signCertPath' => __DIR__.'/../keys/unionpay/test/sign/700000000000001_acp.pfx', //签名证书路径
     'signCertPwd' => '000000', //签名证书密码
     'verifyCertPath' => __DIR__.'/../keys/unionpay/test/verify/verify_sign_acp.cer', //验签证书路径
     'merId' => 'xxxxxxx',
     //正式环境参数
     //'frontUrl' => 'https://101.231.204.80:5000/gateway/api/frontTransReq.do', //前台交易请求地址
     //'singleQueryUrl' => 'https://101.231.204.80:5000/gateway/api/queryTrans.do', //单笔查询请求地址
     //'signCertPath' => __DIR__.'/../keys/unionpay/test/sign/PM_700000000000001_acp.pfx', //签名证书路径
     //'signCertPwd' => '000000', //签名证书密码
     //'verifyCertPath' => __DIR__.'/../keys/unionpay/test/verify/verify_sign_acp.cer', //验签证书路径
     //'merId' => 'xxxxxxxxx', //商户代码
 ],

?>