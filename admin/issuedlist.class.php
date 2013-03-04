<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Issuedlist extends Tp{
	public function initInstance() {

		//实例化
		$pager = new pageList(count($this->getAll()));

		$arr_issued = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("pageList",$pager);
		$this->assign("arr_issued",$arr_issued);
		$this->display("issuedlist.html");
	}
	//列表 xuqinghua 2011-01-11
	public function getData($start,$end){
		$strSQL = "SELECT i.*,c.class_name,city.city_name,s.seller_name FROM ".__PREFIX_TAB__ ."groupon_info AS i,".__PREFIX_TAB__ ."groupon_class AS c,".__PREFIX_TAB__ ."city AS city,".__PREFIX_TAB__ ."seller AS s WHERE i.groupon_class_id=c.id AND i.groupon_city_id=city.id AND i.groupon_seller_id=s.id";
		return $this->conn->getAll($strSQL);


	}
	//获取总数  分页用 xuqinghua 2011-01-11
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","id");
		return $this->conn->getAll($strSQL);
	}
}