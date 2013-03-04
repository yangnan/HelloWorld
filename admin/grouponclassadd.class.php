<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Grouponclassadd extends Tp{

	public function initInstance() {
		$this->thinkUp();

		$this->display("grouponclassadd.html");
	}

	public function thinkUp(){
	   //P($_SESSION);
	   if($_POST['Submit']){
	       $name=$_POST['name'];

		      $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."groupon_class",array("class_name"=>"$name"));
		      if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/grouponclasslist/");
			  }else{
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			  }



	   }
	}

}