<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-14
 **/
require_once("common/permission.php");
class bsedit extends Tp{
	public function initInstance(){
		$this->saveData();
		$bsArr = $this->getData();
		$bsclass = $this->getclass();
		$bsarea = $this->getarea();
		$this->assign("bsclass",$bsclass);
		$this->assign("bsarea",$bsarea);
		$this->assign("bsArr",$bsArr);
		$this->display("bsedit.html");
	}

	//获取原数据
	public function getData(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seller","*",array(array("id","=",$_GET['id'])));
		return $this->conn->getRow($strSQL);
	}

	public function getclass(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*");
		return $this->conn->getAll($strSQL);
	}

	public function getarea(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*");
		return $this->conn->getAll($strSQL);
	}

	//更新数据
	public function saveData(){
		if($_POST)
		{
			$id = $_GET['id'];
			$seller_user_name = $_POST["seller_user_name"];
			$seller_user_pass = $_POST["seller_user_pass"];
			$name = $_POST["seller_name"];
			$class = $_POST["seller_class_id"];
			$contact = $_POST["seller_contact"];
			$phone = $_POST["seller_phone"];
			$status = $_POST["seller_status"];
			$seller_address = $_POST["seller_address"];
			$seller_url = $_POST["seller_url"];
			$seller_mobile = $_POST["seller_mobile"];
			$seller_bank_open = $_POST["seller_bank_open"];
			$seller_bank_name = $_POST["seller_bank_name"];
			$seller_bank_account = $_POST["seller_bank_account"];
            $seller_position = $_POST["seller_position"];
            $seller_other = $_POST["seller_other"];
            $seller_else = $_POST["seller_else"];


			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."seller",array("seller_user_name"=>$seller_user_name,"seller_user_pass"=>$seller_user_pass,"seller_name"=>$name,"seller_address"=>$seller_address,"seller_url"=>$seller_url,"seller_mobile"=>$seller_mobile,"seller_class_id"=>$class,"seller_contact"=>$contact,"seller_phone"=>$phone,"seller_status"=>1,"seller_bank_open"=>$seller_bank_open,"seller_bank_name"=>$seller_bank_name,"seller_bank_account"=>$seller_bank_account,"seller_position"=>$seller_position,"seller_other"=>$seller_other,"seller_else"=>$seller_else),array(array("id","=",$_GET['id'])));
			//执行修改函数
			if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/bslist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
		}
	}

}