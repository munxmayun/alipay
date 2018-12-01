<?php

namespace alipay;

use alipaysdk\aop\AopClient;
use alipaysdk\aop\request\AlipayTradeRefundRequest;
use app\common\Tools;

class Alirefund{

    public function refund() {
        $aop = new AopClient ();
        $param = input('post.');
        $out_trade_no = $param['out_trade_no'];
        $refund_amount = $param['refund_amount'];
        $aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
        $aop->appId = '2018110562010220';
        $aop->rsaPrivateKey = 'MIIEpAIBAAKCAQEA+T5mYrLnvLqMlT8zkTc5CvCxJ6+otWqsBhsEQizWCTVbnDkFJ5vlK+s7JYddV68NdML+JGxdRQ0aW57rWek/1XXFInEjHzppWXF8MQjtJqae010n5AQZU2NciB2nfqeyfoVMCFOtYrT73IePlvzULUPJfPq1sZlc0Qm85Bd1EXmJCwvtWI7zRv1iPLNVlpkfi7qJPRPug+9KsK65/PBsyCwWkEAt0+sD+AtfcxkwY5CPYtAMp8VA/XoR/CwAXQoXBJhkf7C/45lWHwVaZBFpYu9/T+Cj9a0RXfUevTUbXNKqGrBC/LMJTzi/g6aq6qb7SgZs8dwTaC4GTZMpciYrcwIDAQABAoIBAHz3T2hvIQecVP5DqPxHPt+AXKJ0TVdge424IAN57XrCeQM0B6SbYmUJ1Sb03tUm3M1NMxVaC82iSzPi00fKTgoduVCSfzSaGdYRs132hskZQ4rgKy8E6xnHOM66Z492T2VmOf/2zHkwGxOwGEtwyoVDdpOmNFEufr4EbuPB6x1t3/3mW9pYaNiMTm/pri3FV+6STn7gO46I00Or2z9xODg2v78GKct7hxyF0Kan0nMuvWCjh1lbxkaF4FctMSBKOHTejtyN0DzF4igzlpuEsIxIJH6LyvgEBmUQT/rXbzZO1qowKp5U0weUYS0/z1XDhFTq2srahTfA2z8IWqdeyKkCgYEA/Y5LrV+sIc0K0xBQG3Uqcn2kLUkzfft9WKM4SDViBwmcts6jhBzcFKZB3PFU5/ahsBUnWH/YF9wELom1E305eRvrDFwKaehG+LZv94yZ4+v2ECSpk9dMbgGQ/iDkFJ75hhy3aviqMih9zVyVebbavKWmHfkRNJUV5uw9YSFInqcCgYEA+6V2mtLjTr75Ln6ufHFiyhmbsQcHXf4XirntlzxUcZ8/sntA3VcQiP5u6pDYncJB1TQVEyKgrjw8jHwu83AvSRzIRYinLcy3QdIG7n/3IptQN+seDt2mqsD1N1/TNBYgR3ix7tDUW72o04WWBZmmIYwxIRf+EElh4PHxxgsIUlUCgYEA+RpNWx19PQ/2rHmAWhl4BFdPbnZWMlVbRjPE3ZwknIli/25v0yGPTnIwjuJB6kqxew6tQxMGuBoduaLs1SLXzhYRjGj4iif7YenKgsgNgJCXhDCgsXB51DGRwzmJGoE83/dic6Otge2p+pIVACkXKPMNCrFhp+k4RVCe1MggUk0CgYAib1nzhbglJmzit+MYlEt4bFipuNSBQCvoh9jDQTYs9iW5PrR5lVhl5qs23etGazam/iGEJNDoBsYiUzv5g/h0gMPHABQgaEsLbroUGN6wlaA8hqfuUNZlt1HW6f30urJgFVwD2f+1LhbUGwuUaJobLRvr82SIxgHmzjTPbOMOoQKBgQCEdricWhQDBWjyw4b138iL6k9FME7rmFOxkvoD4QfKJO9xvNMLzdIyLPSsZi3rYX3USeyhflaklP193b56/yu6d/cbXHTBo3XkfJ/LGEvi9FAo/nsZZQG5AS94P+8GFE3f3i3haEFofA5nPfeXr1K+omt0ENocIh+0HKRsBUhQQg==';
        $aop->alipayrsaPublicKey = 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmfIl5Cfx0Bp22GG1mg4KMPN2kgdZUfxBdgp8h/HDgidK+blU2T8h++9sOB54vx9Ia9/YU0uih8VKHnwFKrUxNV5rHeiAyZee7XJ5v/4k+W6OHI4C1nFKY3rrwRJ+qbT3rUhTvcFRzhlQVhQvLCz7bY5MEGLAPy8N+s+zve39yPs+95sigCV4WHC512PmVa7p5s9KJd4oW9S0pyMd24GAKd18LXH4QsEno2Y55HYd6HTBqTEQo/5eE6AkZ3n1jAKBxI1XukLdlSnFCRHkVQUvDSnOcbfI/nTceZxsSy9by8XGNoi6z0F+81RD8elVVvfRLzL68QQ9yQbI9q5zRP1sWQIDAQAB';
        $aop->apiVersion = '1.0';
        $aop->signType = 'RSA2';
        $aop->postCharset = 'UTF-8';
        $aop->format = 'json';
        $request = new AlipayTradeRefundRequest ();
        $request->setBizContent("{" .
//            "\"trade_no\":\"2017112821001004030523090753\"," .
                "\"out_trade_no\":\"$out_trade_no\"," .
                "\"refund_amount\":$refund_amount," .
                "\"refund_reason\":\"正常退款\"," .
                "\"out_request_no\":\"HZ01RF001\"," .
                "\"operator_id\":\"OP001\"," .
                "\"store_id\":\"NJ_S_001\"," .
                "\"terminal_id\":\"NJ_T_001\"" .
                "  }");
        $result = $aop->execute($request);

        $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        $resultCode = $result->$responseNode->code;
        if (!empty($resultCode) && $resultCode == 10000) {
            Tools::jsonCode('200', '$result', '退款成功');
        } else {
            Tools::jsonCode('400', '$result', '退款失败');
        }
    }

}
