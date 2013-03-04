<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Footernavlist extends Tp{
	public function initInstance() {

		//每页显示条数 xuqinghua 2011-1-13

		//实例化
		$pageList = new pageList(count($this->getAll()));
		$nav_list = $this->getData($pageList->getStartRow(),$pageList->perpage);
		$this->assign("uid",$uid);
		$this->assign("pageList",$pageList);
		$this->assign("nav_list",$this->returnFname($nav_list));
		$this->display("footernavlist.html");
	}
	//列表 xuqinghua  2011-1-13
	public function getData($start,$end){
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*","",array($start,$end),array("foot_nav_sorting"=>"desc"));
			return $this->conn->getAll($strSQL);

	}
	//处理大类名称，将fid转换成中文类别名称
	public function getFname($fid)
	{
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","foot_nav_title",array(array("id","=","$fid")),array("1"));
		return $this->conn->getRow($strSQL);
	}

	//处理大类名称，将fid转换成中文类别名称
	public function returnFname($data)
	{
		$dataLen = count($data);
		for($i=0;$i<$dataLen;$i++)
		{
			$nav = $this->getFname($data[$i]["fid"]);
			$data[$i]["nav_f_title"] = $nav["foot_nav_title"];
		}
		return $data;

	}

	//获取总数  分页用 xuqinghua 2011-1-13
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","id");
		return $this->conn->getAll($strSQL);
	}
}