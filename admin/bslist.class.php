<?php
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-14
 */
require_once("common/permission.php");
class bslist extends Tp{
	public function initInstance(){
		//分页
		$pager = new pageList(count($this->getAll()),'',20);

		$bslistArr = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("bslistArr",$bslistArr);
		$this->assign("pager",$pager);
		$bsclass = $this->getclass();
		$bscity = $this->getcity();
		$getSearchParam = $this->getselect();
		$this->assign("bscity",$bscity);
		$this->assign("bsclass",$bsclass);
		$this->display("bslist.html");
	}

	//列表页
	public function getData($start,$end){
		$strSQL = "SELECT s.*,gc.class_name FROM  tg_seller AS s,tg_groupon_class AS gc WHERE s.seller_class_id = gc.id LIMIT " .$start.",".$end;
		return $this->conn->getAll($strSQL);
	}

	//获取全部数据（分页）
	public function getAll(){
		$strSQL = "SELECT * FROM  tg_seller AS a,tg_groupon_class AS b WHERE a.seller_class_id = b.id";
		return $this->conn->getAll($strSQL);
	}

	//数据查询
	public function getcity(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*");
		return $this->conn->getAll($strSQL);
	}

	public function getclass(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*");
		return $this->conn->getAll($strSQL);
	}

	public function getselect(){

		if($_POST[submit]){
		//echo "执行了";
			$str = "SELECT * FROM ".__PREFIX_TAB__ ."seller";  //用自己的语法 大写
			if(!empty($_POST["textfield"]) || !empty($_POST["seller_status"]) || !empty($_POST["seller_city_id"]) || !empty($_POST["seller_class_id"]) ){
				$str .= " WHERE ";
				if($_POST["textfield"] != ""){
					$str .= " seller_name = ".$_POST["textfield"];
				}
				if($_POST["seller_status"] != "" && $_POST["seller_status"] != 0){
					$str .= "AND seller_status = ".$_POST["seller_status"];
				}
				if($_POST["seller_city_id"] != "" && $_POST["seller_city_id"] != 0){ //0===全部
					$str .= " AND seller_city_id = ".$_POST["seller_city_id"];
				}
				if($_POST["seller_class_id"] != "" && $_POST["seller_class_id"] != 0){
					$str .= " AND seller_class_id = ".$_POST["seller_class_id"];
				}
			}
			//echo $str;
		}
	}
}