<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-17
 **/
L(__FRAME__."/shop/ShopCar.class.php");
require_once("common/permission.php");
class BuyPay extends Tp{
	public $payInfo;
    public $order_id;

	public function initInstance() {
        $this->payInfo = $this->getPayInfo();
        $this->order_id = $_GET["order_id"];
        $cart = ShopCar::getOneItem($this->order_id);
        if(!empty($cart))
        {

            $shopData = $cart;
        }
        else{
            //失去session或cart数据,读数据库
            $shopData = $this->getCartShopData();
            $shopData["quantity"] = $shopData["order_num"];
            ShopCar::addCar($this->order_id,$shopData);
        }
		$shopData["countprice"] = $shopData["groupon_present_price"]*$shopData["quantity"];
        $userInfo = $this->getUserInfo();
        $shopData["changeMoney"] = abs($userInfo["users_money"]-$shopData["countprice"]);
		$this->assign("userinfo",$userInfo);
        $this->assign("seo",$this->getSeo());
		$this->assign("payinfo",$this->payInfo);
		$this->assign("shopdata",$shopData);
		$this->assign("contact",$this->getsyscontact());
		$this->display("buy/pay.html");
	}
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }


    //根据订单ID查询商品相关数据
    public function getCartShopData() {
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_id","=",$this->order_id)));
	    $orderinfo = $this->conn->getRow($strSQL);
	//团购信息
		$strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("id","=",$orderinfo["order_groupon_id"])),array(0,1));
		$shopinfo = $this->conn->getRow($strSQL2);
	if(!empty($orderinfo) && !empty($shopinfo))
	{
        	$orderinfo = array_merge($orderinfo,$shopinfo);
	}
        return $orderinfo;
    }
	public function getsyscontact()
	{
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*","",array(0,1));
		return $this->conn->getRow($strSQL);
	}
	//users info xiezhanhui
	public function getUserInfo()
	{
		$uid = $_SESSION["uid"];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=",$uid)),array(0,1));
		return $this->conn->getRow($strSQL);

	}


	//get pay info
	public function getPayInfo()
	{
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."pay","*",array(array("pay_status","=",1)));
		return $this->conn->getAll($strSQL);
	}


}
