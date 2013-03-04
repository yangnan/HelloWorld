<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Sendproduct extends Tp{

	public function initInstance() {
        if($_GET["operation"] != "del")
        {
            $this->Up();
        }
        else{
$this->del();
        }
    }

   public function Up(){

	     $id=$_GET['id'];

		 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."order",array("product_state"=>"1"),array(array("id","=","$id")));
		    if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"",-1);
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}
	  }
      public function del() {
$id=$_GET['id'];
		$strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."order",array(array("id","=",$_GET['id'])));

		if($this->conn->execute($strSQL)){
			H("删除成功","",-1);
		 }
      }
}