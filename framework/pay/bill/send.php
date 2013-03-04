<?PHP
/*
 * @Description: 快钱人民币支付网关接口范例
 * @Copyright (c) 上海快钱信息服务有限公司
 * @version 2.0
 * @author:xiezhanhui <jeffxie@gmail.com> 2010-9-1
 */
class SendData{
//获取数据类
    public $data;
    public $new_data; //加工以后的数据
    public function __construct($data) {
        $this->data = $data;
    //生成加密签名串
    ///请务必按照如下顺序和规则组成加密串！
        $signMsgVal = $this->appendParam($signMsgVal,"inputCharset",$this->data["inputCharset"]);
        $signMsgVal = $this->appendParam($signMsgVal,"bgUrl",$this->data["bgUrl"]);
        $signMsgVal = $this->appendParam($signMsgVal,"version",$this->data["version"]);
        $signMsgVal = $this->appendParam($signMsgVal,"language",$this->data["language"]);
        $signMsgVal = $this->appendParam($signMsgVal,"signType",$this->data["signType"]);
        $signMsgVal = $this->appendParam($signMsgVal,"merchantAcctId",$this->data["merchantAcctId"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payerName",$this->data["payerName"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payerContactType",$this->data["payerContactType"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payerContact",$this->data["payerContact"]);
        $signMsgVal = $this->appendParam($signMsgVal,"orderId",$this->data["orderId"]);
        $signMsgVal = $this->appendParam($signMsgVal,"orderAmount",$this->data["orderAmount"]);
        $signMsgVal = $this->appendParam($signMsgVal,"orderTime",$this->data["orderTime"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productName",$this->data["productName"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productNum",$this->data["productNum"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productId",$this->data["productId"]);
        $signMsgVal = $this->appendParam($signMsgVal,"productDesc",$this->data["productDesc"]);
        $signMsgVal = $this->appendParam($signMsgVal,"ext1",$this->data["ext1"]);
        $signMsgVal = $this->appendParam($signMsgVal,"ext2",$this->data["ext2"]);
        $signMsgVal = $this->appendParam($signMsgVal,"payType",$this->data["payType"]);
        $signMsgVal = $this->appendParam($signMsgVal,"redoFlag",$this->data["redoFlag"]);
        $signMsgVal = $this->appendParam($signMsgVal,"pid",$this->data["pid"]);
        $signMsgVal = $this->appendParam($signMsgVal,"key",$this->data["key"]);
        $this->new_data["inputCharset"] = "1";
        $this->new_data["bgUrl"] = $this->data["bgUrl"];
        $this->new_data["version"] = "v3.0";
        $this->new_data["language"] = "1";
        $this->new_data["signType"] = "1";
        $this->new_data["merchantAcctId"] = $this->data["shopid"];
        $this->new_data["payerName"] = $this->data["username"];
        $this->new_data["payerContactType"] = "";
        $this->new_data["payerContact"] = "";
        $this->new_data["orderId"] = $this->data["orderId"];
        $this->new_data["orderAmount"] = $this->data["price"];;
        $this->new_data["orderTime"] = date('YmdHis');
        $this->new_data["productName"] = $this->data["title"];
        $this->new_data["productNum"] = "1";
        $this->new_data["productId"] = "";
        $this->new_data["productDesc"] = $this->data["title"];
        $this->new_data["ext1"] = "";
        $this->new_data["ext2"] = "";
        $this->new_data["payType"] = "00";
        $this->new_data["redoFlag"] = "";
        $this->new_data["pid"] = "";
        $this->new_data["signMsg"] = strtoupper(md5($signMsgVal)); //生成md5签名
        return $this->new_data;

    }

	//功能函数。将变量值不为空的参数组成字符串
	public function appendParam($returnStr,$paramId,$paramValue)
    {

		if($returnStr!=""){

				if($paramValue!=""){

					$returnStr.="&".$paramId."=".$paramValue;
				}

		}else{

			If($paramValue!=""){
				$returnStr=$paramId."=".$paramValue;
			}
		}

		return $returnStr;
	}
	//功能函数。将变量值不为空的参数组成字符串。结束

}



/*
//人民币网关账户号
///请登录快钱系统获取用户编号，用户编号后加01即为人民币网关账户号。
$merchantAcctId="1000300079901";

//人民币网关密钥
///区分大小写.请与快钱联系索取
$key="1234567897654321";

//字符集.固定选择值。可为空。
///只能选择1、2、3.
///1代表UTF-8; 2代表GBK; 3代表gb2312
///默认值为1
$inputCharset="3";

//服务器接受支付结果的后台地址.与[pageUrl]不能同时为空。必须是绝对地址。
///快钱通过服务器连接的方式将交易结果发送到[bgUrl]对应的页面地址，在商户处理完成后输出的<result>如果为1，页面会转向到<redirecturl>对应的地址。
///如果快钱未接收到<redirecturl>对应的地址，快钱将把支付结果GET到[pageUrl]对应的页面。
$bgUrl="http://www.yoursite.com/receive.php";

//网关版本.固定值
///快钱会根据版本号来调用对应的接口处理程序。
///本代码版本号固定为v2.0
$version="v2.0";

//语言种类.固定选择值。
///只能选择1、2、3
///1代表中文；2代表英文
///默认值为1
$language="1";

//签名类型.固定值
///1代表MD5签名
///当前版本固定为1
$signType="1";

//支付人姓名
///可为中文或英文字符
$payerName="payerName";

//支付人联系方式类型.固定选择值
///只能选择1
///1代表Email
$payerContactType="1";

//支付人联系方式
///只能选择Email或手机号
$payerContact="";

//商户订单号
///由字母、数字、或[-][_]组成
$orderId=date('YmdHis');

//订单金额
///以分为单位，必须是整型数字
///比方2，代表0.02元
$orderAmount="2";

//订单提交时间
///14位数字。年[4位]月[2位]日[2位]时[2位]分[2位]秒[2位]
///如；20080101010101
$orderTime=date('YmdHis');

//商品名称
///可为中文或英文字符
$productName="productName";

//商品数量
///可为空，非空时必须为数字
$productNum="1";

//商品代码
///可为字符或者数字
$productId="";

//商品描述
$productDesc="";

//扩展字段1
///在支付结束后原样返回给商户
$ext1="";

//扩展字段2
///在支付结束后原样返回给商户
$ext2="";

//支付方式.固定选择值
///只能选择00、10、11、12、13、14
///00：组合支付（网关支付页面显示快钱支持的各种支付方式，推荐使用）10：银行卡支付（网关支付页面只显示银行卡支付）.11：电话银行支付（网关支付页面只显示电话支付）.12：快钱账户支付（网关支付页面只显示快钱账户支付）.13：线下支付（网关支付页面只显示线下支付方式）
$payType="00";

//同一订单禁止重复提交标志
///固定选择值： 1、0
///1代表同一订单号只允许提交1次；0表示同一订单号在没有支付成功的前提下可重复提交多次。默认为0建议实物购物车结算类商户采用0；虚拟产品类商户采用1
$redoFlag="0";

//快钱的合作伙伴的账户号
///如未和快钱签订代理合作协议，不需要填写本参数
$pid=""; ///合作伙伴在快钱的用户编号

*/


?>