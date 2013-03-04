<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-23
 **/
require_once("common/permission.php");
class Emailedit extends Tp{

	public function initInstance() {
		$this->saveData();
        $this->assign("email_select",$this->email_select());
		$this->display("emailedit.html");
	}
    public function email_select(){
	   $id=$_GET['id'];
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."email","*",array(array("id","=","$id")));
	   return $this->conn->getRow($strSQL);
	}

	public function saveData(){

		//获取传过来的POST值
		if($_POST['submit'])

		{
			$email = $_POST['email'];
			$pubtime=time();
			$id=$_GET['id'];
			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."email",array("email_name"=>"$email","email_time"=>"$pubtime"),array(array("id","=","$id")));

					//执行函数
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/emaillist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
        }
    }
}
?>