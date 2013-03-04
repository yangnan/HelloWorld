<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-20
 **/
require_once("common/permission.php");
class Templatelist extends Tp{
	public function initInstance() {
        $this->getUp();
        $this->assign("nums",$this->getSelect());
		$this->display("templatelist.html");
	}
	//列表 xuqinghua  2011-01-20
	public function getSelect(){

			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."template","*","");
			$num= $this->conn->getAll($strSQL);
			for($i=0;$i<count($num);$i++)
		    {
			   $nums[$i+1] = $num[$i];
		    }
            return $nums;

	}
	//默认设置 xuqinghua 2011-01-21
	public function getUp(){
	   if($_POST['submit']){
		  $default=$_POST['default'];
		  $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."template",array("template_default"=>2));
	      $strSQL1 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."template",array("template_default"=>1),array(array("id","=","$default")));
				if($this->conn->execute($strSQL) && $this->conn->execute($strSQL1)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/templatelist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
	   }

	}

}
?>