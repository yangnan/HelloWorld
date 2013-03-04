<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-17
 **/
require_once("common/permission.php");
class Seolist extends Tp{
	public function initInstance() {

		//每页显示条数 xuqinghua 2011-01-17
		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_seo = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("pageList",$pageList);
		$this->assign("arr_seo",$arr_seo);
		$this->display("seolist.html");
	}
	//列表 xuqinghua  2011-01-17
	public function getData($start,$end){
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*","",array($start,$end));
		return $this->conn->getAll($strSQL);

	}
	//获取总数  分页用 xuqinghua 2011-01-17
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","id");
		return $this->conn->getAll($strSQL);
	}
}