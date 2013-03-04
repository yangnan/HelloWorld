<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Adminlist extends Tp{
	public function initInstance() {

		//每页显示条数 xuqinghua 2011-1-13

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_admin = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$uid=empty($_SESSION['uid'])?1:$_SESSION['uid'];
		$uid=1;
		$this->assign("uid",$uid);
		$this->assign("pageList",$pageList);
		$this->assign("arr_admin",$arr_admin);
		$this->display("adminlist.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData($start,$end){
	    $uid=empty($_SESSION['uid'])?1:$_SESSION['uid'];
	    $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","*",array(array("id","=","$uid")));
		$val=$this->conn->getRow($strSQL1);
		if($val['level']==1){
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","*","",array($start,$end),array("level"=>"desc"));
			return $this->conn->getAll($strSQL);
		}else{
		    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","*",array(array("id","=","$uid")));
			return $this->conn->getAll($strSQL);
		}

	}
	//获取总数  分页用 xuqinghua 2011-1-13
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","id");
		return $this->conn->getAll($strSQL);
	}
}