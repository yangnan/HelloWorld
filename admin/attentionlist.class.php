<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Attentionlist extends Tp{
	public function initInstance() {

		//每页显示条数 xuqinghua 2011-1-19

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_ping = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("pageList",$pageList);
		$this->assign("arr_ping",$arr_ping);
		$this->display("attentionlist.html");
	}
	//列表 xuqinghua  2011-1-19
	public function getData($start,$end){
		   $id=$_GET['id'];
		   if(empty($id)){
			   $strSQL ="select * from ".__PREFIX_TAB__ ."ping where tg_type_id=2 limit ".$start.",".$end;
				return $this->conn->getAll($strSQL);
			}else{
			   $strSQL ="select * from ".__PREFIX_TAB__ ."ping where tg_sid='$id' and tg_type_id=2 limit ".$start.",".$end;
				return $this->conn->getAll($strSQL);
			}

	}
	//获取总数  分页用 xuqinghua 2011-1-19
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."ping","id",array(array("tg_type_id","=","2")));
		return $this->conn->getAll($strSQL);
	}
}
?>