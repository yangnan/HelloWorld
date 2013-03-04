<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 */
require_once("common/permission.php");
class ProvideList extends Tp{
	public function initInstance(){
		//分页
		$pager = new pageList(count($this->getAll()));

		$providelistArr = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("providelistArr",$providelistArr);
		$this->assign("pager",$pager);
		$this->display("providelist.html");
	}

	//demo列表页
	public function getData($start,$end){
	    //查询数据
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."provide","*","",array($start,$end),array("id"=>"DESC"));
		return $this->conn->getAll($strSQL);
	}

	//获取全部数据（分页）
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."provide","id");
		return $this->conn->getAll($strSQL);
	}
}