<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Grouponclasslist extends Tp{
	public function initInstance() {

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_think = $this->getData($pageList->getStartRow(),$pageList->perpage);

		$this->assign("pageList",$pageList);
		$this->assign("arr_think",$arr_think);
		$this->display("grouponclasslist.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData($start,$end){


	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*","",array($start,$end));
		return $this->conn->getAll($strSQL);


	}
	//获取总数  分页用 xuqinghua 2011-1-13
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","id");
		return $this->conn->getAll($strSQL);
	}

}