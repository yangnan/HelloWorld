<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Cityadd extends Tp{

	public function initInstance() {
		$this->insert();
		$this->assign("inquires",$this->inquires());
		$this->display("cityadd.html");
	}

    public function inquires(){
	   $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","*");
	   return $this->conn->getAll($strSQL1);
	}
	public function insert(){
	   if($_POST['Submit']){
	       $add_city=$_POST['add_city'];
	       $name=$_POST['name'];
		   $initials=strtoupper($_POST['initials']);
		   $sorting=$_POST['sorting'];
		   $status=$_POST['status'];
		   $language=$_SESSION['language'];

		      $strSQL1 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."city",array("fid"=>"$add_city","city_name"=>"$name","city_initials"=>"$initials","nav_language"=>"$language","status"=>"$status","sorting"=>"$sorting"));
		      if($this->conn->execute($strSQL1)){
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/citylist/");
			  }else{
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			  }

	   }
	}

}