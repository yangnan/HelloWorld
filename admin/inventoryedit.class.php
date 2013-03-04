<?php
require_once("common/permission.php");
class inventoryedit extends Tp{

	public function initInstance() {
		$dateArr = $this->getDate();
	    $this->upDate();
		$this->assign("dateArr",$dateArr);
		$this->display("inventoryedit.html");
	}

	public function getDate(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."web_info","*",array(array("id","=","$id")),array("1"));
		return $this->conn->getRow($strSQL);
	}

    public function upDate(){
      if($_POST){
	     $id=$_GET['id'];
		 $title = $_POST["title"];
		 $content = $_POST["content"];
		 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."web_info",array("title" => $title,"content" => $content),array(array("id","=",$id)));
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/inventorylist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
		}


   }
}
?>