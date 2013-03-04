<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Listnav extends Tp{
	public function initInstance() {

		//每页显示条数 xuqinghua 2011-1-13

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$nav_list = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("uid",$uid);
		$this->assign("pageList",$pageList);
		$this->assign("nav_list",$nav_list);
		$this->display("navlist.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData($start,$end){
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."nav","*","",array($start,$end),array("nav_sorting"=>"desc"));
			return $this->conn->getAll($strSQL);

	}
	//获取总数  分页用 xuqinghua 2011-1-13
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."nav","id");
		return $this->conn->getAll($strSQL);
	}
}