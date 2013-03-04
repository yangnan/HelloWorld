<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Grouponclassedit extends Tp{

	public function initInstance() {
	    $this->selectUp();

		$this->assign("think_up",$this->selUp());
		$this->display("grouponclassedit.html");
	}


	public function selUp(){
		$id=$_GET['id'];
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*",array(array("id","=","$id")));

		return $this->conn->getRow($strSQL);
	}
   public function selectUp(){

      if($_POST['Submit']){
	     $id=$_GET['id'];
		 $name=$_POST['name'];
			 $strSQL3 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."groupon_class",array("class_name"=>"$name"),array(array("id","=","$id")));
				if($this->conn->execute($strSQL3)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/grouponclasslist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
		}


   }
}