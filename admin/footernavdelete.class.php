<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Footernavdelete extends Tp{

	public function initInstance() {
		$this->delData();
	}

	public function delData(){
		$id = $_GET['id'];
		$SQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("id","=",$id)));
		$val=$this->conn->getRow($SQL);
		if($val['fid']!=0){
		   $strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."foot_nav",array(array("id","=",$id)));
		   if($this->conn->execute($strSQL)){
			  H("","./admin.php?tg=/footernavlist/");
		   }else{
			  H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		   }
		}else{
		   $strSQL1 = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."foot_nav",array(array("fid","=",$id)));
		   $strSQL2 = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."foot_nav",array(array("id","=",$id)));
		   if($this->conn->execute($strSQL1)&&$this->conn->execute($strSQL2)){
			  H("","./admin.php?tg=/footernavlist/");
		   }else{
			  H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		   }
		}
		
	}

}
?>