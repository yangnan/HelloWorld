<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-17
 **/
L(__FRAME__."/shop/ShopCar.class.php");
session_start();
class BuyCreatepay extends Tp{
    public $order_id;
	public function initInstance() {
		global $car;
        if($_GET["type"] == "chk")
        {
            $this->chkOrderState();
            exit();
        }
        $this->order_id = $_GET["order_id"];
	if(!empty($_SESSION["shop_cart_info"]))
	{

        	$shopData = ShopCar::getOneItem($this->order_id);
		$shopData["countprice"] = $shopData["groupon_present_price"]*$shopData["quantity"];
	}

	$userInfo = $this->getUserInfo();
	$shopData["changeMoney"] = ceil($userInfo["users_money"]-$shopData["countprice"]);
    $shopData["order_pay_time"] = time();
    //将用户购物信息写入数据库
    $this->addShopInfo($shopData);

	}

	//users info xiezhanhui
	public function getUserInfo()
	{
		$uid = !empty($_SESSION["uid"])?$_SESSION["uid"]:2;
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=",$uid)),array(0,1));
		return $this->conn->getRow($strSQL);

	}
    public function postQqInfo($userInfo) {
        //写入QQ登录信息 author:jeffxie<jeffxie@gmail.com>
        $users_city = $userInfo["citylist"];
        $users_phone = $userInfo["phone"];
        $users_realname = $userInfo["ship_man"];
        //先检查数据库里有没有这个EMAIL或真实姓名,如果有就不进行写入
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("users_realname","=",$users_realname)),array(0,1));
		$uinfo = $this->conn->getRow($strSQL);
        if(!$uinfo)
        {
            //没有这个人的信息就插入
            $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."users",array("users_realname"=>"$users_realname","users_city"=>"$users_city","users_phone"=>"$users_phone","users_type"=>"2"));
            $this->execute($strSQL);
        }
    }

    //将用户购物信息写入数据库
    public function addShopInfo($shopData){
        //写入QQ登录信息
        if(!empty($_SESSION["qqinfo"]))
        {

            $this->postQqInfo($shopData); //xiezhanhui 2011-5-30
        }
        //配送地址信息
        $users_id = !empty($_SESSION["uid"])?$_SESSION["uid"]:2;
        $users_provice_id = $shopData["province"];
        $users_city_id = $shopData["citylist"];
        $users_street = $shopData["address"];
        $users_postal = $shopData["postcode"];
        $users_phone = $shopData["phone"];
        $users_mobile = $shopData["mobile_phone_number"];
        $users_consignee = $shopData["ship_man"];
		$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."users_address",array("users_id"=>"$users_id","users_provice_id"=>"$users_provice_id","users_city_id"=>"$users_city_id","users_street"=>"$users_street","users_postal"=>"$users_postal","users_phone"=>"$users_phone","users_mobile"=>"$users_mobile","users_consignee"=>"$users_consignee"));


        //写入商品购买信息

        $order_groupon_id = $shopData["id"];
        $order_users_id = $users_id;
        $order_num = $shopData["quantity"];

        $order_remark = "未留言";
        $order_status = 0; //0为正常
        $order_state = 0; //0为未付款
        $order_pub_time = time();
        $order_pay_time = $shopData["order_pay_time"]; //付款时间
        $order_id = $this->order_id;
        $_SESSION["order_id"] = $order_id;
        if(empty($shopData["send_address"]))
        {
            $this->conn->execute($strSQL);
            $order_address_id = $this->conn->lastID();
        }
        else{
            $order_address_id = $shopData["send_address"];
        }

        $strSQL2 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."order",array("order_id"=>$order_id,"order_groupon_id"=>"$order_groupon_id","order_users_id"=>"$order_users_id","order_num"=>"$order_num","order_address_id"=>"$order_address_id","order_remark"=>"$order_remark","order_status"=>"$order_status","order_state"=>"$order_state","order_pub_time"=>"$order_pub_time","order_pay_time"=>"$order_pay_time"));
        //要查询是否有重复的订单，不然不能写入

        $orderSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_id","=",$order_id)));
        $addressFind = $this->conn->getRow($orderSQL);
        if(!$addressFind) //如果订单不存在，就写入新订单
        {
            $this->conn->execute($strSQL2);
        }

		//查出所有该商品的订单，如果已经达到最低团购人数，即停止团购；但如果时间虽到还可以继续团购即修改团购发布和停止日期
        $orderSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_groupon_id","=",$order_groupon_id),array("order_pay_time",">",$shopData["groupon_start_time"])),"",array("order_pay_time"=>"desc"));
		$orderData = $this->conn->getAll($orderSQL); //查出所有该商品的订单,并计算大小，和最后一个时间
		if(count($orderData)>=$shopData["groupon_num"] && $shopData["groupon_stop"] == 2)
		{

			//因为团购人数够了需要结束,因为是还可以多次购买,所以需要重置团购时间 xiezhanhui 2011-4-23
			$date = countGrouponTime($shopData["groupon_start_time"],$shopData["groupon_end_time"]);
			$updateGrouponDate = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."groupon_info",array("groupon_start_time"=>$date["starttime"],"groupon_end_time"=>$date["endtime"]),array(array("id","=",$shopData["id"])));
			//修改团购开始和结束时间
						//echo "<script>location='".$updateGrouponDate."';</script>";die; //调试用
			$this->conn->execute($updateGrouponDate);
		}

        $shopData["order_id"] = $order_id;
        echo $this->getUrl($shopData);

    }

	//支付
	public function getUrl($data){
		$uid = !empty($_SESSION["uid"])?$_SESSION["uid"]:2;
		if($type=$_GET['payid']){
$payInfo=$this->getPayInfo($type);
$userResvAddress = $this->usersAddress($data["send_address"]);

			switch($type)
			{
				case 1:
					L(__FRAME__ . "/pay/alipay/class/alipay_service.php");
                    //设置支付宝所需要的参数

                    $partner         = $payInfo["pay_merchant_id"];					//合作身份者ID
                    $security_code   = $payInfo["pay_password"];	//安全检验码
                    $seller_email    = $payInfo["pay_email"];				//签约支付宝账号或卖家支付宝帐户
                    $_input_charset  = "utf-8";			       //字符编码格式 目前支持 GBK 或 utf-8
                    //$transport       = "";						       //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http

                    $notify_url      = __DOMAIN__ . "/framework/pay/alipay/notify_url.php";    //交易过程中服务器通知的页面 要用 http://格式的完整路径，不允许加?id=123这类自定义参数
                    $return_url      = __DOMAIN__ ;    //付完款后跳转的页面 要用 http://格式的完整路径，不允许加?id=123这类自定义参数
                    $show_url        = __DOMAIN__;			   //网站商品的展示地址，不允许加?id=123这类自定义参数

                    $sign_type       = "MD5";						       //加密方式 不需修改
                    /*以下参数是需要通过下单时的订单数据传入进来获得*/
                    //必填参数
                    $out_trade_no	= $data["order_id"];				//请与贵网站订单系统中的唯一订单号匹配
                    $subject		=  $data["groupon_title"];		//订单名称，显示在支付宝收银台里的“商品名称”里，显示在支付宝的交易管理的“商品名称”的列表里。
                    $body			= $data["groupon_content"];		//订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
                    $price			= $data["countprice"];		//订单总金额，显示在支付宝收银台里的“应付总额”里

                    $logistics_fee		= "0.00";				//物流费用，即运费。
                    $logistics_type		= "EXPRESS";			//物流类型，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
                    $logistics_payment	= "SELLER_PAY";			//物流支付方式，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）

                    $quantity		= $data["quantity"];						//商品数量，建议默认为1，不改变值，把一次交易看成是一次下订单而非购买一件商品。

                    //扩展参数——买家收货信息（推荐作为必填）
                    //该功能作用在于买家已经在商户网站的下单流程中填过一次收货信息，而不需要买家在支付宝的付款流程中再次填写收货信息。
                    //若要使用该功能，请至少保证receive_name、receive_address有值
                    $receive_name		= $userResvAddress["users_consignee"];			//收货人姓名，如：张三
                    $receive_address	= $userResvAddress["users_street"];			//收货人地址，如：XX省XXX市XXX区XXX路XXX小区XXX栋XXX单元XXX号
                    $receive_zip		= $userResvAddress["users_postal"];			//收货人邮编，如：123456
                    $receive_phone		= $userResvAddress["users_phone"];		//收货人电话号码，如：0571-81234567
                    $receive_mobile		= $userResvAddress["users_telephone"];		//收货人手机号码，如：13312341234

                    //扩展参数——第二组物流方式
                    //物流方式是三个为一组成组出现。若要使用，三个参数都需要填上数据；若不使用，三个参数都需要为空
                    //有了第一组物流方式，才能有第二组物流方式，且不能与第一个物流方式中的物流类型相同，
                    //即logistics_type="EXPRESS"，那么logistics_type_1就必须在剩下的两个值（POST、EMS）中选择
                    $logistics_fee_1	= "";					//物流费用，即运费。
                    $logistics_type_1	= "";					//物流类型，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
                    $logistics_payment_1= "";					//物流支付方式，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）

                    //扩展参数——第三组物流方式
                    //物流方式是三个为一组成组出现。若要使用，三个参数都需要填上数据；若不使用，三个参数都需要为空
                    //有了第一组物流方式和第二组物流方式，才能有第三组物流方式，且不能与第一组物流方式和第二组物流方式中的物流类型相同，
                    //即logistics_type="EXPRESS"、logistics_type_1="EMS"，那么logistics_type_2就只能选择"POST"
                    $logistics_fee_2	= "";					//物流费用，即运费。
                    $logistics_type_2	= "";					//物流类型，三个值可选：EXPRESS（快递）、POST（平邮）、EMS（EMS）
                    $logistics_payment_2= "";					//物流支付方式，两个值可选：SELLER_PAY（卖家承担运费）、BUYER_PAY（买家承担运费）

                    //扩展功能参数——其他
                    $buyer_email		= '';					//默认买家支付宝账号
                    $discount	 		= '';					//折扣，是具体的金额，而不是百分比。若要使用打折，请使用负数，并保证小数点最多两位数

                    /////////////////////////////////////////////////

                    //构造要请求的参数数组
                    $parameter = array(
                            "service"			=> "create_partner_trade_by_buyer",	//接口名称，不需要修改
                            "payment_type"		=> "1",               				//交易类型，不需要修改

                            //获取配置文件(alipay_config.php)中的值
                            "partner"			=> $partner,
                            "seller_email"		=> $seller_email,
                          //  "return_url"		=> $return_url,
                            "notify_url"		=> $notify_url,
                            "_input_charset"	=> $_input_charset,
                            "show_url"			=> $show_url,

                            //从订单数据中动态获取到的必填参数
                            "out_trade_no"		=> $out_trade_no,
                            "subject"			=> $subject,
                            "body"				=> $body,
                            "price"				=> $price,
                            "quantity"			=> $quantity,

                            "logistics_fee"		=> $logistics_fee,
                            "logistics_type"	=> $logistics_type,
                            "logistics_payment"	=> $logistics_payment,

                            //扩展功能参数——买家收货信息
                            "receive_name"		=> $receive_name,
                            "receive_address"	=> $receive_address,
                            "receive_zip"		=> $receive_zip,
                            "receive_phone"		=> $receive_phone,
                            "receive_mobile"	=> $receive_mobile,

                            //扩展功能参数——第二组物流方式
                            "logistics_fee_1"	=> $logistics_fee_1,
                            "logistics_type_1"	=> $logistics_type_1,
                            "logistics_payment_1"=> $logistics_payment_1,

                            //扩展功能参数——第三组物流方式
                            "logistics_fee_2"	=> $logistics_fee_2,
                            "logistics_type_2"	=> $logistics_type_2,
                            "logistics_payment_2"=> $logistics_payment_2,

                            //扩展功能参数——其他
                            "discount"			=> $discount,
                            "buyer_email"		=> $buyer_email
                    );
                    //构造请求函数
                    $baopay = new alipay_service($parameter,$security_code,$sign_type);
                            $pay_url = $baopay->create_url();
                            return $pay_url;
				break;
                case 2:
//腾讯通
                    L(__FRAME__ . "/pay/ten/interface.php");


/* 商户号 */
$ten_data["bargainor_id"] = $payInfo["pay_merchant_id"];
/* 密钥 */
$ten_data["key"] = $payInfo["pay_password"];

/* 返回处理地址 */
$ten_data["return_url"] = __DOMAIN__ . "/framework/pay/ten/return_url.php";
//date_default_timezone_set(PRC);
$ten_data["strDate"] = date("Ymd");
$ten_data["strTime"] = date("His");

//4位随机数
$ten_data["randNum"] = rand(1000, 9999);

//10位序列号,可以自行调整。
$ten_data["strReq"] = $ten_data["strTime"] . $ten_data["randNum"];

/* 商家订单号,长度若超过32位，取前32位。财付通只记录商家订单号，不保证唯一。 */
//$ten_data["sp_billno"] = $ten_data["strReq"];
$ten_data["sp_billno"] = $data["order_id"];

/* 财付通交易单号，规则为：10位商户号+8位时间（YYYYmmdd)+10位流水号 */
$ten_data["transaction_id"] = $ten_data["bargainor_id"] . $ten_data["strDate"] . $ten_data["strReq"];

/* 商品价格（包含运费），以分为单位 */
$ten_data["total_fee"] = $data["countprice"]*100;

/* 商品名称 */
$ten_data["desc"] = $data["groupon_title"];



                    $tenpay = new zhifu($ten_data);
                    $pay_url = $tenpay->createUrl();
                    return $pay_url;
                    break;
//腾讯通结束


                    case 3:
//网银接口
                L(__FRAME__ . "/pay/chinabank/chinabank_config.php");
                $domain = __DOMAIN__;
                $datas["v_oid"] = $data["order_id"];
                $datas["v_rcvname"] = $userResvAddress["users_consignee"];
                $datas["v_rcvaddr"] = $userResvAddress["users_street"];
                $datas["v_rcvtel"] = $userResvAddress["users_phone"];
                $datas["v_rcvpost"] = $userResvAddress["users_postal"];
                $datas["v_rcvemail"] = "";
                $datas["v_rcvmobile"] = $userResvAddress["users_telephone"];
                $datas["v_ordername"] = "";
                $datas["v_orderaddr"] = "";
                $datas["v_ordertel"] = "";
                $datas["v_orderpost"] = "";
                $datas["v_orderemail"] = "";
                $datas["v_ordermobile"] = "";
                $datas["v_amount"] = $data["countprice"];
                $data = new zhifu($domain,$datas);
                $pay_url = $data->createUrl();
                return $pay_url;

//网银接口结束
                        break;

            case 4:

//快钱
                    L(__FRAME__ . "/pay/bill/send.php");
                    $pay_config_content[$paytype]["username"] = $_SESSION["username"];
                    $pay_config_content[$paytype]["bgUrl"] = __DOMAIN__;
                    $pay_config_content[$paytype]["orderId"] = $data["order_id"];
                    $pay_config_content[$paytype]["price"] = $data["countprice"]*100;
                    $pay_config_content[$paytype]["title"] = $data["groupon_title"];
                    $pay_config_content[$paytype]["content"] = $data["groupon_content"];
                    $data = new SendData($pay_config_content[$paytype]); //初始化数据
                    $new_data = $data->new_data;
                    P($new_data);
                    $this->assign("new_data",(array)$new_data); //提交的数据
                    $this->assign("pay_url","https://www.99bill.com/gateway/recvMerchantInfoAction.htm"); //要提交到的页面
//快钱结束
                        break;



                        }
                    }

    }
	//get pay info
	public function getPayInfo($id)
	{
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."pay","*",array(array("id","=",$id)),array(0,1));
		return $this->conn->getRow($strSQL);
	}

	//get user resv addrss
	public function usersAddress($send_address)
	{
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users_address","*",array(array("id","=",$send_address)),array(0,1));
		return $this->conn->getRow($strSQL);
	}

    //检查是否付款，和订单状态 xiezhanhui 2011-02-25
    public function chkOrderState() {
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_id","=",$_SESSION["order_id"]),array("order_state","=",1)),array(0,1));
		if($this->conn->getRow($strSQL))
        {
            echo 1; //已付款成功
        }
        else{
            echo 2; //未付款
        }
    }

}
