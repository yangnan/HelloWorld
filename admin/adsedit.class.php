<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Adsedit extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->assign("asd_select",$this->asd_select());

		$this->display("adsedit.html");
	}

    public function asd_select(){
	   $id=$_GET['id'];
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."ads","*",array(array("id","=","$id")));
	   return $this->conn->getRow($strSQL);
	}
	public function saveData(){
		//获取传过来的POST值
		if($_POST['Submit'])
		{
			$page = $_POST['page'];
			$position = $_POST['position'];
			$ads_type = $_POST['ads_type'];
			$start_time = strtotime($_POST["start_time"]);
            $end_time = strtotime($_POST["end_time"]);
            $ads_name = $_POST["ads_name"];
			$gg_content = $_POST["gg_content"];
			$pubtime=time();
			$id=$_GET['id'];

			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."ads",array("ads_page"=>"$page","ads_position"=>"$position","ads_type"=>"$ads_type","ads_name"=>"$ads_name","ads_content"=>"$gg_content","ads_pub_time"=>"$pubtime","ads_start_time"=>"$start_time","ads_end_time"=>"$end_time"),array(array("id","=","$id")));
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/adslist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
        }
    }
}
?>