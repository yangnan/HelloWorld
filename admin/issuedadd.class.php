<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Issuedadd extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->assign("issued",$this->issued());
		$this->assign("business",$this->business());
		$this->assign("city",$this->city());
		$this->assign("expenses",$this->expenses());
		$this->display("issuedadd.html");
	}
	//分类查找
	public function issued(){
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*");
	   return $this->conn->getAll($strSQL);
	}
	//城市查找 xuqinghua
    public function city(){
	   $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*");
	   return $this->conn->getAll($strSQL1);
	}
	//商家
	public function business(){
	   $strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seller","*");
	   return $this->conn->getAll($strSQL2);
	}
	//快递公司
	public function expenses(){
	   $strSQL4 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."express","*");
	   return $this->conn->getAll($strSQL4);
	}
	public function saveData(){
		//获取传过来的POST值
		//L(__FRAME__."/upfile.php");
		if($_POST)
		{
			unset($_POST['Submit']);
			$upload = new UploadFile();
			$upload->maxSize = 3145728 ;
			$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
			$upload->savePath = './uploadfiles/';
			$upload->saveRule = uniqid;
			if($upload->upload()){
			   $info = $upload->getUploadFileInfo();
			}
			foreach($info as $key=>$val){
			  $_POST['groupon_pic'].=$info[$key]["savename"];
			}
			$_POST['groupon_start_time']=strtotime($_POST['groupon_start_time']);
			$_POST['groupon_end_time']=strtotime($_POST['groupon_end_time']);
            $_POST['groupon_language'] = getLanguage();
			$_POST['pubtime'] = time();
			$strSQL3 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."groupon_info",$_POST);

			//执行添加函数
			if($this->conn->execute($strSQL3)){
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/issuedlist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}

}