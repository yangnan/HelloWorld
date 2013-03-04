<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class Frilinklist extends Tp{

	public function initInstance() {

		//分页
		$pager = new pageList(count($this->getAll()));

		$frilink_Arr = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("frilink_Arr",$frilink_Arr);
		$this->assign("pager",$pager);
		$this->display("frilinklist.html");
	}

	//列表
	public function getData($start,$end){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."frilink","*","",array($start,$end),array("id"=>"DESC"));
		return $this->conn->getAll($strSQL);


	}
	//获取总数  分页用
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."frilink","id");
		return $this->conn->getAll($strSQL);
	}
}