<?php
require_once("common/permission.php");
class expressdelete extends Tp{

	public function initInstance() {
		$this->delData();
	}

	public function delData(){
		$strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."express",array(array("id","=",$_GET['id'])));

		if($this->conn->execute($strSQL)){
			H("","./admin.php?tg=/expresslist/");
		 }else{
		    H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		 }
	}

}
?>