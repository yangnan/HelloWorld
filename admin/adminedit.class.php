<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Adminedit extends Tp{

	public function initInstance() {
	    $this->selectUp();
		$admin_up=$this->selUp();
		$this->assign("admin_up",$admin_up);
		$this->display("adminedit.html");
	}


	public function selUp(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","*",array(array("id","=","$id")),array("1"));

		return $this->conn->getRow($strSQL);
	}
   public function selectUp(){

      if($_POST['Submit']){
	     $id=$_GET['id'];
	     $username=$_POST['username'];
		 $password=$_POST['password'];
		 $password1=$_POST['password1'];
		 if($password==$password1){
			 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."admin",array("admin_name"=>"$username","admin_password"=>"$password"),array(array("id","=","$id")));
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/adminlist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
		}else{
		   H(lang_cp::$_TGLOBAL['uilang']['password_not_consistent'],"",-1);

		}
	  }

   }
}