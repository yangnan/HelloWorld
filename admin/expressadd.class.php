<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-15
 **/
require_once("common/permission.php");
class expressadd extends Tp{
	public function initInstance(){
		$this->Add();
		
		$this->display("expressadd.html");
	}

	public function Add(){
		if(!empty($_POST["Submit"])){
		$express_name = $_POST["express_name"];
		$express_address = $_POST["express_address"];
		$express_phone = $_POST["express_phone"];
		$express_mobile = $_POST["express_mobile"];
		$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."express",array("express_name" => $express_name,"express_address" => $express_address,"express_phone" => $express_phone,"express_mobile" => $express_mobile));
		if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/expresslist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}
}