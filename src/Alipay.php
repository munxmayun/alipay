<?php

namespace alipay;

class Alipay {

    protected $appId;
    protected $returnUrl;
    protected $notifyUrl;
    protected $charset;
    //私钥值
    protected $rsaPrivateKey;
    protected $totalFee;
    protected $outTradeNo;
    protected $orderName;

    public function alipay() {
        $param = input('post.');
        $aliPay = new Alipay();
        $aliPay->setAppid('2018110562010220');
        $aliPay->setReturnUrl('https://www.fdimall.com');
        $aliPay->setNotifyUrl('http://www.fdimall.com');
        $aliPay->setRsaPrivateKey('MIIEpAIBAAKCAQEA+T5mYrLnvLqMlT8zkTc5CvCxJ6+otWqsBhsEQizWCTVbnDkFJ5vlK+s7JYddV68NdML+JGxdRQ0aW57rWek/1XXFInEjHzppWXF8MQjtJqae010n5AQZU2NciB2nfqeyfoVMCFOtYrT73IePlvzULUPJfPq1sZlc0Qm85Bd1EXmJCwvtWI7zRv1iPLNVlpkfi7qJPRPug+9KsK65/PBsyCwWkEAt0+sD+AtfcxkwY5CPYtAMp8VA/XoR/CwAXQoXBJhkf7C/45lWHwVaZBFpYu9/T+Cj9a0RXfUevTUbXNKqGrBC/LMJTzi/g6aq6qb7SgZs8dwTaC4GTZMpciYrcwIDAQABAoIBAHz3T2hvIQecVP5DqPxHPt+AXKJ0TVdge424IAN57XrCeQM0B6SbYmUJ1Sb03tUm3M1NMxVaC82iSzPi00fKTgoduVCSfzSaGdYRs132hskZQ4rgKy8E6xnHOM66Z492T2VmOf/2zHkwGxOwGEtwyoVDdpOmNFEufr4EbuPB6x1t3/3mW9pYaNiMTm/pri3FV+6STn7gO46I00Or2z9xODg2v78GKct7hxyF0Kan0nMuvWCjh1lbxkaF4FctMSBKOHTejtyN0DzF4igzlpuEsIxIJH6LyvgEBmUQT/rXbzZO1qowKp5U0weUYS0/z1XDhFTq2srahTfA2z8IWqdeyKkCgYEA/Y5LrV+sIc0K0xBQG3Uqcn2kLUkzfft9WKM4SDViBwmcts6jhBzcFKZB3PFU5/ahsBUnWH/YF9wELom1E305eRvrDFwKaehG+LZv94yZ4+v2ECSpk9dMbgGQ/iDkFJ75hhy3aviqMih9zVyVebbavKWmHfkRNJUV5uw9YSFInqcCgYEA+6V2mtLjTr75Ln6ufHFiyhmbsQcHXf4XirntlzxUcZ8/sntA3VcQiP5u6pDYncJB1TQVEyKgrjw8jHwu83AvSRzIRYinLcy3QdIG7n/3IptQN+seDt2mqsD1N1/TNBYgR3ix7tDUW72o04WWBZmmIYwxIRf+EElh4PHxxgsIUlUCgYEA+RpNWx19PQ/2rHmAWhl4BFdPbnZWMlVbRjPE3ZwknIli/25v0yGPTnIwjuJB6kqxew6tQxMGuBoduaLs1SLXzhYRjGj4iif7YenKgsgNgJCXhDCgsXB51DGRwzmJGoE83/dic6Otge2p+pIVACkXKPMNCrFhp+k4RVCe1MggUk0CgYAib1nzhbglJmzit+MYlEt4bFipuNSBQCvoh9jDQTYs9iW5PrR5lVhl5qs23etGazam/iGEJNDoBsYiUzv5g/h0gMPHABQgaEsLbroUGN6wlaA8hqfuUNZlt1HW6f30urJgFVwD2f+1LhbUGwuUaJobLRvr82SIxgHmzjTPbOMOoQKBgQCEdricWhQDBWjyw4b138iL6k9FME7rmFOxkvoD4QfKJO9xvNMLzdIyLPSsZi3rYX3USeyhflaklP193b56/yu6d/cbXHTBo3XkfJ/LGEvi9FAo/nsZZQG5AS94P+8GFE3f3i3haEFofA5nPfeXr1K+omt0ENocIh+0HKRsBUhQQg==');
        $aliPay->setTotalFee($param['total_amount']);
        $aliPay->setOutTradeNo($param['out_trade_no']);
        $aliPay->setOrderName($param['subject']);
        $sHtml = $aliPay->doPay();
        echo $sHtml;
    }

    public function __construct() {
        $this->charset = 'utf8';
    }

    public function setAppid($appid) {
        $this->appId = $appid;
    }

    public function setReturnUrl($returnUrl) {
        $this->returnUrl = $returnUrl;
    }

    public function setNotifyUrl($notifyUrl) {
        $this->notifyUrl = $notifyUrl;
    }

    public function setRsaPrivateKey($saPrivateKey) {
        $this->rsaPrivateKey = $saPrivateKey;
    }

    public function setTotalFee($payAmount) {
        $this->totalFee = $payAmount;
    }

    public function setOutTradeNo($outTradeNo) {
        $this->outTradeNo = $outTradeNo;
    }

    public function setOrderName($orderName) {
        $this->orderName = $orderName;
    }

    /**
     * 发起订单
     * @return array
     */
    public function doPay() {
        //请求参数
        $requestConfigs = array(
            'out_trade_no' => $this->outTradeNo,
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
            'total_amount' => $this->totalFee, //单位 元
            'subject' => $this->orderName, //订单标题
        );
        $commonConfigs = array(
            //公共参数
            'app_id' => $this->appId,
            'method' => 'alipay.trade.page.pay', //接口名称
            'format' => 'JSON',
            'return_url' => $this->returnUrl,
            'charset' => $this->charset,
            'sign_type' => 'RSA2',
            'timestamp' => date('Y-m-d H:i:s'),
            'version' => '1.0',
            'notify_url' => $this->notifyUrl,
            'biz_content' => json_encode($requestConfigs),
        );
        $commonConfigs["sign"] = $this->generateSign($commonConfigs, $commonConfigs['sign_type']);
        return $this->buildRequestForm($commonConfigs);
    }

    /**
     * 建立请求，以表单HTML形式构造（默认）
     * @param $para_temp 请求参数数组
     * @return 提交表单HTML文本
     */
    protected function buildRequestForm($para_temp) {
        $sHtml = "正在跳转至支付页面...<form id='alipaysubmit' name='alipaysubmit' action='https://openapi.alipay.com/gateway.do?charset=" . $this->charset . "' method='POST'>";
        while (list ($key, $val) = each($para_temp)) {
            if (false === $this->checkEmpty($val)) {
                $val = str_replace("'", "&apos;", $val);
                $sHtml .= "<input type='hidden' name='" . $key . "' value='" . $val . "'/>";
            }
        }
        //submit按钮控件请不要含有name属性
        $sHtml = $sHtml . "<input type='submit' value='ok' style='display:none;''></form>";
        $sHtml = $sHtml . "<script>document.forms['alipaysubmit'].submit();</script>";
        return $sHtml;
    }

    public function generateSign($params, $signType = "RSA") {
        return $this->sign($this->getSignContent($params), $signType);
    }

    protected function sign($data, $signType = "RSA") {
        $priKey = $this->rsaPrivateKey;
        $res = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($priKey, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";
        ($res) or die('您使用的私钥格式错误，请检查RSA私钥配置');
        if ("RSA2" == $signType) {
            openssl_sign($data, $sign, $res, version_compare(PHP_VERSION, '5.4.0', '<') ? SHA256 : OPENSSL_ALGO_SHA256); //OPENSSL_ALGO_SHA256是php5.4.8以上版本才支持
        } else {
            openssl_sign($data, $sign, $res);
        }
        $sign = base64_encode($sign);
        return $sign;
    }

    /**
     * 校验$value是否非空
     *  if not set ,return true;
     *    if is null , return true;
     * */
    protected function checkEmpty($value) {
        if (!isset($value))
            return true;
        if ($value === null)
            return true;
        if (trim($value) === "")
            return true;
        return false;
    }

    public function getSignContent($params) {
        ksort($params);
        $stringToBeSigned = "";
        $i = 0;
        foreach ($params as $k => $v) {
            if (false === $this->checkEmpty($v) && "@" != substr($v, 0, 1)) {
                // 转换成目标字符集
                $v = $this->characet($v, $this->charset);
                if ($i == 0) {
                    $stringToBeSigned .= "$k" . "=" . "$v";
                } else {
                    $stringToBeSigned .= "&" . "$k" . "=" . "$v";
                }
                $i++;
            }
        }
        unset($k, $v);
        return $stringToBeSigned;
    }

    /**
     * 转换字符集编码
     * @param $data
     * @param $targetCharset
     * @return string
     */
    function characet($data, $targetCharset) {
        if (!empty($data)) {
            $fileType = $this->charset;
            if (strcasecmp($fileType, $targetCharset) != 0) {
                $data = mb_convert_encoding($data, $targetCharset, $fileType);
                //$data = iconv($fileType, $targetCharset.'//IGNORE', $data);
            }
        }
        return $data;
    }

}
