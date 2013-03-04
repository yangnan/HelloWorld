<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 **/
require_once("common/permission.php");
class Extraadd extends Tp{

	public function initInstance() {
		$this->saveData();
		$extraClass = $this->getExtraClass();
		$this->assign("extraClass",$extraClass);
		$this->display("extraadd.html");
	}


	public function saveData(){
		//获取传过来的POST值
		if($_POST)
		{
			unset($_POST['Submit']);
			$_POST['pubtime'] = time();
			$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."extra",$_POST);

			//执行添加函数
			if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/extralist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}

	//号外分类列表
	public function getExtraClass(){
	    //查询数据
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."extra_class","*");
		return $this->conn->getAll($strSQL);
	}
}