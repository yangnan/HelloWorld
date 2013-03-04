<?php
//---------------------------------------------------------
//财付通即时到帐支付请求示例，商户按照此文档进行开发即可
//---------------------------------------------------------
require_once ("classes/PayRequestHandler.class.php");
class zhifu {
    public $bargainor_id;
    public $key;
    public $return_url;
    public $strDate;
    public $strTime;
    public $randNum;
    public $strReq;
    public $sp_billno;
    public $transaction_id;
    public $total_fee;
    public $desc;
    public function __construct($data) {
        $this->bargainor_id = $data["bargainor_id"];
        $this->key = $data["key"];
        $this->return_url = $data["return_url"];
        $this->strDate = $data["strDate"];
        $this->strTime = $data["strTime"];
        $this->randNum = $data["randNum"];
        $this->strReq = $data["strReq"];
        $this->sp_billno = $data["sp_billno"];
        $this->transaction_id = $data["transaction_id"];
        $this->total_fee = $data["total_fee"];
        $this->desc = $data["desc"];

    }
    public function createUrl() {
        /* 创建支付请求对象 */
        $reqHandler = new PayRequestHandler();
        $reqHandler->init();
        $reqHandler->setKey($this->key);

        //----------------------------------------
        //设置支付参数
        //----------------------------------------
        $reqHandler->setParameter("bargainor_id", $this->bargainor_id);			//商户号
        $reqHandler->setParameter("sp_billno", $this->sp_billno);					//商户订单号
        $reqHandler->setParameter("transaction_id", $this->transaction_id);		//财付通交易单号
        $reqHandler->setParameter("total_fee", $this->total_fee);					//商品总金额,以分为单位
        $reqHandler->setParameter("return_url", $this->return_url);				//返回处理地址
        $reqHandler->setParameter("desc", "订单号：" . $this->transaction_id);	//商品名称

        //用户ip,测试环境时不要加这个ip参数，正式环境再加此参数
        $reqHandler->setParameter("spbill_create_ip", $_SERVER['REMOTE_ADDR']);

        //请求的URL
        $reqUrl = $reqHandler->getRequestURL();
        return $reqUrl;
    }
}
?>
