<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-11
 **/
require_once("common/permission.php");
class Usersprepaid extends Tp{

	public function initInstance() {
	    $this->sprepaid();

		$this->assign("detailed",$this->detailed());
		$this->display("usersprepaid.html");
	}


	public function sprepaid(){
	    if($_POST['submit']){
		   $id=$_GET['id'];
		   $prepaid=$_POST['prepaid'];
		   $date_time=time();

		   //查询余额
		   $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=","$id")),array("1"));
		   $money=$this->conn->getRow($strSQL1);
		   $moneyup=($prepaid+$money['users_money']);
		   //插入数据
		   $strSQL2 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."money",array("money_users_id"=>"$id","money_num"=>"$prepaid","money_time"=>"$date_time"));
		   //更新数据
		   $strSQL3 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."users",array("users_money"=>"$moneyup"),array(array("id","=","$id")));
		   //执行添加函数
		   $this->conn->execute($strSQL2);
		      if($this->conn->execute($strSQL2) && $this->conn->execute($strSQL3)){
				 H(lang_cp::$_TGLOBAL['uilang']['prepaid_phone'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/userlist/");
			  }else{
				 H(lang_cp::$_TGLOBAL['uilang']['prepaid_phone'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			  }

		}
	}
    public function detailed(){
	   $id=$_GET['id'];
	   $strSQL4 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."money","*",array(array("money_users_id","=","$id")));
	   return $this->conn->getAll($strSQL4);
	}
}
?>