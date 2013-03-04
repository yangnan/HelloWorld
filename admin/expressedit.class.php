<?php
require_once("common/permission.php");
class expressedit extends Tp{

	public function initInstance() {
		$dateArr = $this->getDate();
	    $this->upDate();
		$this->assign("dateArr",$dateArr);
		$this->display("expressedit.html");
	}

	public function getDate(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."express","*",array(array("id","=","$id")),array("1"));
		return $this->conn->getRow($strSQL);
	}

    public function upDate(){
      if($_POST){
	     $id=$_GET['id'];
		 $express_name = $_POST["express_name"];
		 $express_address = $_POST["express_address"];
		 $express_phone = $_POST["express_phone"];
		 $express_mobile = $_POST["express_mobile"];
		 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."express",array("express_name" => $express_name,"express_address" => $express_address,"express_phone" => $express_phone,"express_mobile" => $express_mobile),array(array("id","=",$id)));
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/expresslist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
		}


   }
}
?>