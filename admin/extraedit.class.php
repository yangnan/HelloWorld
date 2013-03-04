<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class Extraedit extends Tp{

	public function initInstance() {
		$this->saveData();
		$extraClass = $this->getExtraClass();
		$extraArr = $this->getData();
		$this->assign("extraClass",$extraClass);
		$this->assign("extraArr",$extraArr);
		$this->display("extraedit.html");
	}


	public function saveData(){
		if($_POST)
		{
			unset($_POST['Submit']);
			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."extra",$_POST,array(array("id","=",$_GET['id'])));

			//执行修改函数
			if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/extralist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}

	//号外分类列表
	public function getExtraClass(){
	    //查询数据
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."extra_class","*");
		return $this->conn->getAll($strSQL);
	}

	//获取原数据
	public function getData(){
	    //查询数据
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."extra","*",array(array("id","=",$_GET['id'])));
		return $this->conn->getRow($strSQL);
	}
}