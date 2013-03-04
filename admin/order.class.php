<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Order extends Tp{
	public function initInstance() {

		//实例化
		$pager = new pageList(count($this->getAll()));

		$arr_issued = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("pageList",$pager);
		$this->assign("arr_issued",$arr_issued);
		$this->display("order.html");
	}
	//列表 xiezhanhui 2011-5-3
	public function getData($start,$end){
        $order_state = $_GET["order_state"]; //0未付，1付款，2当期
        switch($order_state)
        {
            case 0:
                    $strSQL = "SELECT * FROM ".__PREFIX_TAB__ ."order";
                break;
            case 1:
                    $strSQL = "SELECT * FROM ".__PREFIX_TAB__ ."order WHERE order_state=1";
                break;
            case 2:
                    $strSQL = "SELECT * FROM ".__PREFIX_TAB__ ."order WHERE order_state=0";
                break;

        }
		$data = $this->conn->getAll($strSQL);
        $dataLen = count($data);
        for($i=0;$i<$dataLen;$i++)
        {
            $data[$i]["uname"] = $this->getUserInfo($data[$i]["order_users_id"]);
            $data[$i]["shopname"] = $this->getGrouponInfo($data[$i]["order_groupon_id"]);
        }

        return $data;
	}
	//获取总数  分页用 xiezhanhui 2011-5-3
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."order","id");
		return $this->conn->getAll($strSQL);
	}

//获取groupon信息
    public function getGrouponInfo($sid) {
        $strSQL = "SELECT groupon_shop_name,groupon_present_price FROM " .__PREFIX_TAB__ . "groupon_info WHERE id=$sid";
        return $this->conn->getRow($strSQL);
    }

    //获取用户信息
    public function getUserInfo($uid) {
        $strSQL = "SELECT users_realname FROM " .__PREFIX_TAB__ . "users WHERE id=$uid";
        return $this->conn->getRow($strSQL);
    }

}