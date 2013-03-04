<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class VipDelshoplist extends Tp{

	public function initInstance() {

		//登录中心
        $this->assign("seo",$this->getSeo());
        $this->assign("delshoplist",$this->getData());
		$this->display("vip/delshoplist.html");
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
		$sql = "select o.*,i.groupon_pic as groupon_pic,i.groupon_shop_name,i.groupon_present_price from ".__PREFIX_TAB__ ."order as o,".__PREFIX_TAB__ ."groupon_info as i where o.order_groupon_id=i.id and o.order_status=1 and o.order_users_id=".$uid;
		$data = $this->conn->getAll($sql);
        for($i=0;$i<count($data);$i++)
        {
            $pic = split(",",$data[$i]["groupon_pic"]);
            $data[$i]["groupon_pic"] = $pic[0];
        }
        return $data;
	}

}
?>