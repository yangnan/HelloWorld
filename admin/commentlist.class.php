<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Commentlist extends Tp{
	public function initInstance() {

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_ping = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("pageList",$pageList);
		$this->assign("arr_ping",$arr_ping);
		$this->display("commentlist.html");
	}
	//列表 xuqinghua  2011-1-19
	public function getData($start,$end){
	    //$uid=$_SESSION['uid'];
		   $strSQL ="SELECT p.*,u.users_realname FROM ".__PREFIX_TAB__ ."ping AS p ,".__PREFIX_TAB__ ."users AS u WHERE p.tg_uid=u.id AND p.tg_type_id=1";
		   return $this->conn->getAll($strSQL);

	}
	//获取总数  分页用 xuqinghua 2011-1-19
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."ping","id",array(array("tg_type_id","=","1")));
		return $this->conn->getAll($strSQL);
	}
	//
}
?>