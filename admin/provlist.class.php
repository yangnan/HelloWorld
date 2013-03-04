<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Provlist extends Tp{
	public function initInstance() {

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_prov = $this->getData($pageList->getStartRow(),$pageList->perpage);

		$this->assign("pageList",$pageList);
		$this->assign("arr_prov",$arr_prov);
		$this->display("provlist.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData($start,$end){


	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","*","",array($start,$end));
		return $this->conn->getAll($strSQL);


	}
	//获取总数  分页用 xuqinghua 2011-1-13
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","id");
		return $this->conn->getAll($strSQL);
	}

}