<?php

//---------------------------------------------------------
//财付通即时到帐支付应答（处理回调）示例，商户按照此文档进行开发即可
//---------------------------------------------------------

require_once ("./classes/PayResponseHandler.class.php");
require_once("../../../define.php");
require_once("../../../config/db.config.php");
require_once("../../../config/tp.class.php");
require_once(__FRAME__."/page/page.class.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once(__FRAME__."/sendmail/email.class.php");
$conn = DBFactory::createDb(__DATANAME__);
/* 密钥 */
$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."pay","*",array(array("id","=",2)));
$payinfo = $conn->getRow($strSQL);
$key = $payinfo["pay_password"];
/* 创建支付应答对象 */
$resHandler = new PayResponseHandler();
$resHandler->setKey($key);

//判断签名
if($resHandler->isTenpaySign()) {

	//交易单号
	$transaction_id = $resHandler->getParameter("transaction_id");

	//金额,以分为单位
	$total_fee = $resHandler->getParameter("total_fee");

	//支付结果
	$pay_result = $resHandler->getParameter("pay_result");
	//本站订单号
	$sp_billno = $resHandler->getParameter("sp_billno");
	if( "0" == $pay_result ) {

		//------------------------------
		//处理业务开始
		//------------------------------

		//注意交易单不要重复处理
		//注意判断返回金额

		//------------------------------
		//处理业务完毕
		//------------------------------
        //更改订单状态，设置为已付款 xiezhanhui<jeffxie@gmail.com>
		$strSQL = "UPDATE ".__PREFIX_TAB__."order SET order_state=1,order_pay_time=".time()." WHERE order_id=".$sp_billno;
        //需要执行这条SQL语句，要连接数据库
        $conn->execute($strSQL);
		//调用doShow, 打印meta值跟js代码,告诉财付通处理成功,并在用户浏览器显示$show页面.
		$show = __DOMAIN__ . "/framework/pay/ten/show.php";
		$resHandler->doShow($show);

	} else {
		//当做不成功处理
		echo "<br/>" . "支付失败" . "<br/>";
	}

} else {
	echo "<br/>" . "认证签名失败" . "<br/>";
}

//echo $resHandler->getDebugInfo();
?>