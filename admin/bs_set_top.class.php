<?php
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-15
 */
require_once("common/permission.php");
class bs_set_top extends Tp{
	public function initInstance(){

		$bstop = $this->settop();

	}

	//更新"置顶"字段
	public function settop(){
		$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."seller",array("seller_top"=>1),array(array("id","=",$_GET['id'])));

		if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['set_top'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/bslist/");
			}else{
				H(lang_cp::$_TGLOBAL['uilang']['set_top'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			}

	}

}
?>