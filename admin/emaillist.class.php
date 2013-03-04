<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-17
 **/
require_once("common/permission.php");
L("common/json.php");
class Emaillist extends Tp{
	public function initInstance() {

		//实例化
		$this->batch();
		$pageList = new pageList(count($this->getAll()));
		$arr_email = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("pageList",$pageList);
		$this->assign("arr_email",$arr_email);
		$this->display("emaillist.html");
	}
	//列表 xuqinghua  2011-01-17
	public function getData($start,$end){
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."email","*","",array($start,$end));
		return $this->conn->getAll($strSQL);

	}
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."email","id");
		return $this->conn->getAll($strSQL);
	}
	//批量发送传值
	public function batch(){
	   if($_POST['submit']){
	      $json=new Services_JSON();
		  $select=$_POST['select'];
		  $json=new Services_JSON();
		  $id=addslashes($json->encode($select));
		  H('',"./admin.php?tg=/sendemail/id/$id");
	   }
	}

}
?>