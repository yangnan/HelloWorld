<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Orderinfo extends Tp{
	public function initInstance() {

		//实例化
		$arr_prov = $this->getData();
		$this->assign("arr_prov",$arr_prov);
		$this->display("orderinfo.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData(){
		$id=$_GET['id'];
	   $strSQL = "SELECT u.users_email AS email,u.users_realname as users_realname,address.users_mobile as users_mobile,g.groupon_present_price as groupon_present_price,g.groupon_shop_name AS groupon_shop_name FROM ".__PREFIX_TAB__ ."order  o,".__PREFIX_TAB__."users u,".__PREFIX_TAB__."groupon_info g,".__PREFIX_TAB__."users_address as address WHERE address.users_id=u.id AND o.order_users_id=u.id AND o.order_groupon_id=g.id AND o.id=$id";
		return $this->conn->getRow($strSQL);

	}

}
?>