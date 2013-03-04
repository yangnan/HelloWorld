<?php
require_once("common/permission.php");
class inventorydelete extends Tp{

	public function initInstance() {
		$this->delData();
	}

	public function delData(){
		$cid=$_GET['id'];
		$strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."web_info",array(array("id","=",$_GET['id'])));
		if($this->conn->execute($strSQL)){
			H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/siterelatedlist/");
		 }else{
		    H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		 }
	}

}
?>