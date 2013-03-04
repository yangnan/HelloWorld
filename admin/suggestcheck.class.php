<?php
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-10
 */
require_once("common/permission.php");
class suggestcheck extends Tp{
	public function initInstance(){
		$suggestArr = $this->getData();
		$suggestClass = $this->getSuggestClass();
		$this->assign("suggestArr",$suggestArr);
		$this->assign("suggestClass",$suggestClass);
		$this->display("suggestcheck.html");
	}

	//意见反馈列表
	public function getSuggestClass(){
	    //查询数据
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."suggestion","*");
		return $this->conn->getAll($strSQL);
	}

	public function getData(){
	    //查询数据
		$id = $_GET["id"];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."suggestion","*",array(array("id","=",$id)));
		return $this->conn->getRow($strSQL);

	}

}
