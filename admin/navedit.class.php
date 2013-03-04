<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Navedit extends Tp{

	public function initInstance() {
	    $this->selectUp();
		$navdata=$this->selUp();
		$this->assign("navdata",$navdata);
		$this->display("navadd.html");
	}


	public function selUp(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."nav","*",array(array("id","=","$id")),array("1"));
		return $this->conn->getRow($strSQL);
	}
   public function selectUp(){

      if($_POST['Submit']){
	     $id=$_GET['id'];
	     $nav_title=$_POST['nav_title'];
		 $nav_link=$_POST['nav_link'];
		 $nav_sorting=$_POST['nav_sorting'];
         $nav_pubtime = time();

         $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."nav",array("nav_title"=>"$nav_title","nav_link"=>"$nav_link","nav_sorting"=>$nav_sorting,"nav_pubtime"=>$nav_pubtime),array(array("id","=","$id")));
        if($this->conn->execute($strSQL)){
            H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/listnav/");
        }else{
            H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
        }
	  }

   }
}
