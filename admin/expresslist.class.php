<?php
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-14
 */
require_once("common/permission.php");
class expresslist extends Tp{
	public function initInstance(){
		//分页
		$pager = new pageList(count($this->getAll()),'',5);
		$expresslistArr = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("expresslistArr",$expresslistArr);
		$this->assign("pager",$pager);
		$this->display("expresslist.html");
	}

	//列表页
	public function getData($start,$end){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."express","*","",array($start,$end),array("id"=>"DESC"));
		return $this->conn->getAll($strSQL);
	}

	//获取全部数据（分页）
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."express","*");
		return $this->conn->getAll($strSQL);
	}


}
?>