<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-20
 **/
require_once("common/permission.php");
class Templateimport extends Tp{
	public function initInstance() {
        $this->getInsert();
		$this->display("templateimport.html");
	}
	//编辑 xuqinghua 2011-01-21
	public function getInsert(){

	   if($_POST['submit']){

	        $style_name = $_POST['style_name'];
			$directory = $_POST['directory'];
			$language = $_SESSION['language'];
			$pubtime = time();

	       $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."template",array("tg_language"=>"$language","template_path"=>"$directory","style_name"=>"$style_name","template_default"=>"2","template_pic"=>"preview.jpg","template_pubtime"=>"$pubtime"));
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/templatelist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
	   }

	}

}