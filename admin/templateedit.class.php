<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-20
 **/
require_once("common/permission.php");
class Templateedit extends Tp{
	public function initInstance() {
        $this->getUp();
		$this->assign("edit_template",$this->getSelect());
		$this->display("templateedit.html");
	}
	public function getSelect(){
	   $id=$_GET['id'];
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."template","*",array(array("id","=","$id")));
	   return $this->conn->getRow($strSQL);
	}
	//编辑 xuqinghua 2011-01-21
	public function getUp(){
	   if($_POST['submit']){
	      $id=$_GET['id'];
		  $style_name=$_POST['style_name'];
		  $directory=$_POST['directory'];
	      $strSQL1 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."template",array("template_path"=>"$directory","style_name"=>"$style_name"),array(array("id","=","$id")));
				if($this->conn->execute($strSQL1)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/templatelist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
	   }

	}

}