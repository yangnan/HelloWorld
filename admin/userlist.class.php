<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Userlist extends Tp{
	public function initInstance() {

		//实例化
		$pager = new pageList(count($this->getAll()));

		$arr = $this->getData($pager->getStartRow(),$pager->perpage);
		$this->assign("pageList",$pager);
		$this->assign("arr",$arr);
		$this->display("userlist.html");
	}
	//列表 xuqinghua 2011-01-11
	public function getData($start,$end){
	    if($_POST['submit']){
		   if(empty($_POST['username']) && empty($_POST['account_balance'])){
		       H(lang_cp::$_TGLOBAL['uilang']['search'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
		   }else{
				if($_POST['username']!=''){//按用户名搜索
					$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("users_realname","like","%".$_POST['username']."%")),array($start,$end),array("id"=>"DESC"));
					return $this->conn->getAll($strSQL);

				}
			}
		}else{
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*","",array($start,$end),array("id"=>"DESC"));
			return $this->conn->getAll($strSQL);
		}

	}
	//获取总数  分页用 xuqinghua 2011-01-11
	public function getAll(){
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","id");
		return $this->conn->getAll($strSQL);
	}
}