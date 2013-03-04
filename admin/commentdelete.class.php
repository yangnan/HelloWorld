<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Commentdelete extends Tp{

	public function initInstance() {
		$this->delData();
	}

	public function delData(){
		$strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."ping",array(array("id","=",$_GET['id'])));

		if($this->conn->execute($strSQL)){
			H("","./admin.php?tg=/commentlist/");
		 }else{
		    H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);

		 }
	}

}
?>