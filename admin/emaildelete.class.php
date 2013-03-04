<?php
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 */
require_once("common/permission.php");
class Emaildelete extends Tp{
	public function initInstance() {
		//连接数据库
		$this->delData();
	}

	public function delData(){
		 $strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__."email",array(array("id","=",$_GET['id'])));

	    //执行删除函数
		if($this->conn->execute($strSQL)){
		    H("信息删除成功","./admin.php?tg=/emaillist/");
		 }else{
		    H("信息删除失败");
			echo "<script>location:history.back(-1);</script>";
		 }
	}
}