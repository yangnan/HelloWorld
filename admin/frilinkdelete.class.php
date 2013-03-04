<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xiezhanhui<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class Frilinkdelete extends Tp{

	public function initInstance() {
		$this->delData();
	}

	public function delData(){
		$strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."frilink",array(array("id","=",$_GET['id'])));

		if($this->conn->execute($strSQL)){
			H("","./admin.php?tg=/frilinklist/");
		 }else{
		    H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		 }
	}

}