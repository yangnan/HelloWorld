<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Provadd extends Tp{

	public function initInstance() {
		$this->insert();
		$this->assign("inquires",$this->inquires());
		$this->display("provadd.html");
	}

    public function inquires(){
	   $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","*");
	   return $this->conn->getAll($strSQL1);
	}
	public function insert(){
	   if($_POST['Submit']){
	       $name=$_POST['name'];

		   $language=$_SESSION['language'];


		      $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."p_c",array("p_c_name"=>"$name","nav_language"=>"$language"));
		      if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/provlist/");
			  }else{
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			  }



	   }
	}

}