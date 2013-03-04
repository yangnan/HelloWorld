<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class VipShoplist extends Tp{

	public function initInstance() {

		//登录中心
		$this->del();
        $this->assign("seo",$this->getSeo());
        $this->assign("shoplist",$this->getData());
		$this->display("vip/shoplist.html");
	}
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }

	//查出个人信息
	public function getData(){
		$uid = $_SESSION['uid'];
        $order_state = $_GET["order_state"];
        if(empty($order_state))
        {
		    $sql = "select o.*,i.groupon_pic as groupon_pic,i.groupon_shop_name,i.groupon_present_price from ".__PREFIX_TAB__ ."order as o,".__PREFIX_TAB__ ."groupon_info as i where o.order_groupon_id=i.id AND o.order_status=0 AND o.order_users_id=".$uid;
        }
        else{
		    $sql = "select o.*,i.groupon_pic as groupon_pic,i.groupon_shop_name,i.groupon_present_price from ".__PREFIX_TAB__ ."order as o,".__PREFIX_TAB__ ."groupon_info as i where o.order_groupon_id=i.id AND o.order_status=0 AND o.order_users_id=".$uid . " AND order_state=" . $order_state;
        }
		$data = $this->conn->getAll($sql);
        for($i=0;$i<count($data);$i++)
        {
            $pic = split(",",$data[$i]["groupon_pic"]);
            $data[$i]["groupon_pic"] = $pic[0];
        }
        return $data;
	}
	public function del(){
	   $id=$_GET['id'];
	   $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."order",array("order_status"=>1),array(array("id","=","$id")));
	   return $this->conn->execute($strSQL);
	}

}
?>