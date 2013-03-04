<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Navadd extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->display("navadd.html");
	}


	public function saveData(){
		//获取传过来的POST值
		if($_POST['Submit'])
		{
                $nav_title = $_POST["nav_title"];
                $nav_link = $_POST["nav_link"];
                $nav_sorting = $_POST["nav_sorting"];
                $nav_pubtime = time();
                $nav_lang = $_SESSION["language"];
                $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."nav",array("	nav_title"=>"$nav_title","nav_link"=>"$nav_link","nav_sorting"=>"$nav_sorting","nav_pubtime"=>"$nav_pubtime","nav_lang"=>$nav_lang));

                //执行添加函数
                if($this->conn->execute($strSQL)){
                    H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/listnav/");
                }else{
                    H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
                }
		}
	}

}
?>