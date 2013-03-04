<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Footernavadd extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->assign("bigclass",$this->readBigClass());
		$this->display("footernavadd.html");
	}


	public function saveData(){
		//获取传过来的POST值
		if($_POST['Submit'])
		{
                $foot_nav_title = $_POST["nav_title"];
                $foot_nav_link = $_POST["nav_link"];
                $foot_nav_sorting = $_POST["nav_sorting"];
                $foot_nav_pubtime = time();
                $foot_nav_lang = getLanguage();
				$bigclass = $_POST["bigclass"];
                $content = $_POST["gg_content"];
                $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."foot_nav",array("fid"=>$bigclass,"foot_nav_title"=>"$foot_nav_title","foot_nav_link"=>"$foot_nav_link","foot_nav_sorting"=>"$foot_nav_sorting","foot_nav_pubtime"=>"$foot_nav_pubtime","foot_nav_lang"=>$foot_nav_lang,"content"=>$content));

                //执行添加函数
                if($this->conn->execute($strSQL)){
                    H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/footernavlist/");
                }else{
                    H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
                }
			}
		}
		//读取大类
		public function readBigClass()
		{
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("fid","=",0)));
			return $this->conn->getAll($strSQL);
		}


}
?>