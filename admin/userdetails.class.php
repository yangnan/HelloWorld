<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Userdetails extends Tp{

	public function initInstance() {
		$arr_edit = $this->getData();
		$this->assign("arr_edit",$arr_edit);
		$this->display("userdetails.html");
	}

	public function getData(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=",$_GET['id'])));
		return $this->conn->getRow($strSQL);
	}
}