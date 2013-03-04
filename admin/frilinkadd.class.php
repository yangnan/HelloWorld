<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class frilinkadd extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->display("frilinkadd.html");
	}


	public function saveData(){
		//获取传过来的POST值
		if($_POST)
		{
			unset($_POST['Submit']);
			$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."frilink",$_POST);

			//执行添加函数
			if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/frilinklist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}
}
