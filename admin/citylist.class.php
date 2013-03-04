<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Citylist extends Tp{
	public function initInstance() {

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$arr_city = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->D_provinces();
		$this->assign("pageList",$pageList);
		$this->assign("provinces",$this->Provinces());
		$this->assign("arr_city",$arr_city);
		$this->display("citylist.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData($start,$end){


	   $strSQL1 = "SELECT c.*,p.p_c_name,p.nav_language FROM ". __PREFIX_TAB__ ."city AS c,". __PREFIX_TAB__ ."p_c AS p WHERE c.fid=p.id";
		return $this->conn->getAll($strSQL1);


	}
	//获取总数  分页用 xuqinghua 2011-1-13
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","id");
		return $this->conn->getAll($strSQL);
	}
	//查询省份
	public function Provinces(){
	   $strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."p_c","*");
	   return $this->conn->getAll($strSQL2);
	}

	//删除省份
	public function D_provinces(){

	   if($_POST['submit']){
		   $strSQL3 = SqlBuilder::buildDeleteSql(__PREFIX_TAB__ ."_p_c",array(array("id","=",$_POST['del'])));

			//执行删除函数
			if($this->conn->execute($strSQL3)){
				H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/citylist/");
			 }else{
				H(lang_cp::$_TGLOBAL['uilang']['del'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			 }
		}
	}
}
