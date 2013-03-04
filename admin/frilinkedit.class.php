<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class Frilinkedit extends Tp{

	public function initInstance() {
		$this->saveData();
		$FrilinkArr = $this->getData();
		$this->assign("FrilinkArr",$FrilinkArr);
		$this->display("frilinkedit.html");
	}


	public function saveData(){
		if($_POST)
		{
			unset($_POST['Submit']);
			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."frilink",$_POST,array(array("id","=",$_GET['id'])));

			if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/frilinklist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}

	public function getData(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."frilink","*",array(array("id","=",$_GET['id'])));
		return $this->conn->getRow($strSQL);
	}
}