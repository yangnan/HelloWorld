<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-15
 **/
require_once("common/permission.php");
class bsadd extends Tp{
	public function initInstance(){
		$this->saveData();
		$bscity = $this->getcity();
		$bsclass = $this->getclass();
		$this->assign("bscity",$bscity);
		$this->assign("bsclass",$bsclass);
		$this->display("bsadd.html");
	}

	public function saveData(){
		//获取POST值
		if($_POST){
			unset($_POST['Submit']);

		//商家图片上传
		 $bool = ($_FILES["seller_pic"]["type"] == "image/gif")||($_FILES["seller_pic"]["type"] == "image/jpeg")||($_FILES["seller_pic"]["type"] == "image/pjpeg")||($_FILES["seller_pic"]["type"] == "image/jpg");
		if (!$bool){
		 H("上传图片类型不对,请重新上传","",-1);
		 exit;
		}
		$handle = move_uploaded_file($_FILES["seller_pic"]["tmp_name"],"uploadfiles/pic/".$_FILES["seller_pic"]["name"]);
		if(!$handle){
			H("上传失败,请重新上传","",-1);
			exit;
		}
		$seller_pic = "../uploadfiles/pic/".$_FILES["seller_pic"]["name"];
	    $_POST['seller_pic']=$seller_pic;

		//执行添加函数
		$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."seller",$_POST);

		if($this->conn->execute($strSQL)){
			H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/bslist/");
		}else{
			H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		}
	}
}

	//商家列表
	public function getcity(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*");
		return $this->conn->getAll($strSQL);
	}

	public function getclass(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*");
		return $this->conn->getAll($strSQL);
	}
}