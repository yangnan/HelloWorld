<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Grouponclassdelete extends Tp{

	public function initInstance() {
		$this->delData();
	}

	public function delData(){
		$strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."groupon_class",array(array("id","=",$_GET['id'])));

		if($this->conn->execute($strSQL)){
			H("","./admin.php?tg=/grouponclasslist/");
		 }else{
		    H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);

		 }
	}

}