<?PHP
require_once("common/permission.php");
class inventoryadd extends Tp{
	public function initInstance(){
		$this->Add();
		$this->display("inventoryadd.html");
	}

	public function Add(){
		if(!empty($_POST["Submit"])){
		$title = $_POST["title"];
		$content = $_POST["content"];
		$pubtime = time();
		$cid=$_GET['id'];
		$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."web_info",array("cid" => $cid, "title" => $title,"content" => $content,"pubtime" => $pubtime));
		if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/inventorylist/id/$cid");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}
}
?>