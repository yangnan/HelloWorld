<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-17
 **/
L(__FRAME__."/shop/ShopCar.class.php");
require_once("common/permission.php");
class BuyShop extends Tp{
	public $grouponInfoArr;
	public function initInstance() {
	$id = $_GET["id"];
        $users_id = !empty($_SESSION["uid"])?$_SESSION["uid"]:2;
        $this->order_id = $users_id . $id .date("YmdHi");
        $cart = ShopCar::getOneItem($this->order_id);
		if(!empty($cart))
		{
			if(ShopCar::getOneItem($this->order_id))
			{
				$this->grouponInfoArr = ShopCar::getOneItem($this->order_id);
			}
			else{
				$this->grouponInfoArr = $this->getData();
				$this->grouponInfoArr["quantity"] = 1;
			}

		}
		else{
			$this->grouponInfoArr = $this->getData();
			$this->grouponInfoArr["quantity"] = 1;
		}
		$uAddress = $this->getUserResvAddress();
		$this->saveData();
        $this->findShopRecorde();
        if(!empty($uAddress))
        {
		    $this->assign("uAddress",$uAddress);
        }
        $this->assign("seo",$this->getSeo());
		$this->assign("grouponInfoArr",$this->grouponInfoArr);
		$this->assign("id",$this->order_id);
		$this->display("buy/shop.html");
	}

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//团购信息
	public function getData(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("id","=",$_GET['id'])),array(0,1));
		return $this->conn->getRow($strSQL);
	}
	//get userinfo
	public function getUserResvAddress()
	{
		$uid = $_SESSION["uid"];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users_address","*",array(array("users_id","=",$uid)));
		return $this->conn->getAll($strSQL);

	}


	//提交订单
	public function saveData(){
		if($_POST)
		{
			//添加
            	$this->grouponInfoArr["quantity"] = $_POST['quantity'];
		if(!empty($_POST["addressid"]))
		{
			$this->grouponInfoArr["send_address"] = $_POST["addressid"];
		}
		else{//如果数据库没有地址，就重新填写第一个配送地址
			$this->grouponInfoArr["province"] = $_POST["province"];
			$this->grouponInfoArr["citylist"] = $_POST["citylist"];
			$this->grouponInfoArr["postcode"] = $_POST["postcode"];
			$this->grouponInfoArr["mobile_phone_number"] = $_POST["mobile"];
            		$this->grouponInfoArr["address"] = $_POST["address"];
			$this->grouponInfoArr["phone"] = $_POST["phone"];
			$this->grouponInfoArr["ship_man"] = $_POST["ship_man"];

		}
	ShopCar::addCar($this->order_id,$this->grouponInfoArr);
	$data =ShopCar::getOneItem($this->order_id);
	H("","./?tg=/buy/pay/order_id/".$this->order_id);
		}
	}
    //查询是否多次购买
    public function findShopRecorde() {
        $uid = $_SESSION["uid"];
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","*",array(array("order_users_id","=",$uid)));
        $data = $this->conn->getAll($strSQL);
        if($data)
        {
            H("你已经购买过了,不能多次购买","","-1");
        }
    }



}
