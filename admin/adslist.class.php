<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-17
 **/
require_once("common/permission.php");
class Adslist extends Tp{
	public function initInstance() {

		//每页显示条数 jeffxie 2011-01-17
		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_ads = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("pageList",$pageList);
		$this->assign("arr_ads",$arr_ads);
		$this->display("adslist.html");
	}
	//列表 jeffxie  2011-01-17
	public function getData($start,$end){
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."ads","*","",array($start,$end));
		$val=$this->conn->getAll($strSQL);
        return $val;
	}
	//获取总数  分页用 jeffxie 2011-01-17
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."ads");
		return $this->conn->getAll($strSQL);
	}
}