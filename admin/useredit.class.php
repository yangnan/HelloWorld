<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Useredit extends Tp{

	public function initInstance() {
	    $this->Up();
		$arr_sel=$this->selUp();
		$this->assign("arr_sel",$arr_sel);
		$this->display("useredit.html");
	}


	public function selUp(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=","$id")),array("1"));

		return $this->conn->getRow($strSQL);
	}
   public function Up(){

      if($_POST['Submit']){
	     $id=$_GET['id'];
		 $user_email=$_POST['user_email'];
	     $username=$_POST['username'];
		 $password=$_POST['password'];
		 $users_money=$_POST['users_money'];
		 $users_integrate=$_POST['users_integrate'];
		 $qq=$_POST['qq'];
		 $telephone=$_POST['telephone'];

		 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."users",array("users_email"=>"$user_email","users_realname"=>"$username","users_password"=>"$password","users_money"=>"$users_money","users_integrate"=>"$users_integrate","users_qq"=>"$qq","users_phone"=>"$telephone"),array(array("id","=","$id")));
		    if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/userlist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
	  }

   }
}