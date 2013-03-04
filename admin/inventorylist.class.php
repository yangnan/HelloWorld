<?php
require_once("common/permission.php");
class inventorylist extends Tp{
	public function initInstance(){
		//分页
		$pager = new pageList(count($this->getAll()));
        $id=$_GET['id'];
		$inventorylistlistArr = $this->getData($pager->getStartRow(),$pager->perpage);
		$all = $this->getAll();
		$this->assign("id",$id);
		$this->assign("all",$all);
		$this->assign("inventorylistlistArr",$inventorylistlistArr);
		$this->assign("pager",$pager);
		$this->display("inventorylist.html");
	}

	//demo列表页
	public function getData($start,$end){
	    //查询数据
		$id=$_GET['id'];
		$strSQL = "SELECT tg_web_info.*,tg_web_info_class.class_name FROM tg_web_info,tg_web_info_class WHERE tg_web_info.cid = tg_web_info_class.id and tg_web_info.cid = '$id' LIMIT ".$start.",".$end;
		return $this->conn->getAll($strSQL);
	}

	//获取全部数据（分页）
	public function getAll(){
		$strSQL = "SELECT tg_web_info.*,tg_web_info_class.class_name FROM tg_web_info,tg_web_info_class WHERE tg_web_info.cid = tg_web_info_class.id ";
		return $this->conn->getAll($strSQL);
	}
}
?>