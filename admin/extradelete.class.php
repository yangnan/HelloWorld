<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class Extradelete extends Tp{
	public function initInstance() {
		//连接数据库
		$this->delData();
	}


	public function delData(){
		 $strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."extra",array(array("id","=",$_GET['id'])));

	    //执行删除函数
		if($this->conn->execute($strSQL)){
			H("","./admin.php?tg=/extralist/");
		 }else{
		    H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		 }
	}
}