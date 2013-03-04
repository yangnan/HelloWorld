<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Cityedit extends Tp{

	public function initInstance() {
	    $this->selectUp();
		$this->assign("provinces",$this->Provinces());
		$this->assign("city_up",$this->selUp());
		$this->display("cityedit.html");
	}


	public function selUp(){
		$id=$_GET['id'];
	    $strSQL ="SELECT c.*,p.p_c_name,p.nav_language FROM ". __PREFIX_TAB__ ."city AS c,". __PREFIX_TAB__ ."p_c AS p WHERE c.id='$id' AND c.fid=p.id";

		return $this->conn->getRow($strSQL);
	}
	public function Provinces(){
	   $strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","*");
	   return $this->conn->getAll($strSQL2);
	}
   public function selectUp(){

      if($_POST['Submit']){
	     $id=$_GET['id'];
	     $edit_city=$_POST['edit_city'];
		 $name=$_POST['name'];
		 $initials=$_POST['initials'];
		 $status=$_POST['status'];
		 $sorting=$_POST['sorting'];
			 $strSQL3 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."city",array("fid"=>"$edit_city","city_name"=>"$name","city_initials"=>"$initials","status"=>"$status","sorting"=>"$sorting"),array(array("id","=","$id")));
				if($this->conn->execute($strSQL3)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/citylist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
		}


   }
}