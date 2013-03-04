<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Adsadd extends Tp{

	public function initInstance() {
		$this->saveData();

		$this->display("adsadd.html");
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
					$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."ads",array("ads_name"=>"$ads_name","ads_page"=>"$page","ads_position"=>"$position","ads_type"=>"$ads_type","ads_start_time"=>"$start_time","ads_end_time"=>"$end_time","ads_content"=>"$gg_content","ads_pub_time"=>"$pubtime"));

					//执行添加函数
					if($this->conn->execute($strSQL)){
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/adslist/");
					}else{
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
					}
        }
    }
}