<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class Adminadd extends Tp{

	public function initInstance() {
		$this->saveData();

		$this->display("adminadd.html");
	}


	public function saveData(){
		//获取传过来的POST值
		if($_POST['Submit'])
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$password1 = $_POST['password1'];
			$regtime = time();
			$regip = $_SERVER["REMOTE_ADDR"];
			//查找Post的值是否存在
			$name = $this->conn->getRow(SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","*",array(array("admin_name","=","$username"))));
			//
			if(!$name){
				if($password == $password1){
					$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."admin",array("admin_name"=>"$username","admin_password"=>"$password","admin_regip"=>"$regip","admin_regtime"=>"$regtime"));

					//执行添加函数
					if($this->conn->execute($strSQL)){
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/adminlist/");
					}else{
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
					}
				}else{
				   H(lang_cp::$_TGLOBAL['uilang']['password_not_consistent'],"",-1);
				}
			}else{
			   H(lang_cp::$_TGLOBAL['uilang']['username_exists'],"",-1);

			}
		}
	}

}
?>