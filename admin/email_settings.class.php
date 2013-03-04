<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Email_settings extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->assign("email_select",$this->email_select());

		$this->display("email_settings.html");
	}

    public function email_select(){
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."mailseting","*");
	   return $this->conn->getRow($strSQL);
	}
	public function saveData(){
		//获取传过来的POST值
		if($_POST['Submit']){
			$smtp_server = $_POST['smtp_server'];
			$smtp_port = $_POST['smtp_port'];
			$smtp_mailboxes = $_POST['smtp_mailboxes'];
			$smtp_accounts =$_POST["smtp_accounts"];
			$smtp_password =$_POST["smtp_password"];
			    $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."mailseting",array("smtp_server"=>"$smtp_server","smtp_port"=>"$smtp_port","smtp_mailboxes"=>"$smtp_mailboxes","smtp_accounts "=>"$smtp_accounts","smtp_password "=>"$smtp_password"));
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/email_settings/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
        }
    }
}
?>