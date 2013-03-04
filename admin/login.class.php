<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-7
 **/
class Login extends Tp{
	public function initInstance() {
        $user = $_POST['username'];
        $pwd = $_POST['password'];
		if(!empty($user) && !empty($pwd)){
            $this->chkLogin($user,$pwd);
		}
		$this->display("login.html");
	}

    public function chkLogin($user,$pwd) {
        $sql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."admin","*",array(array("admin_name","=",$user),array("admin_password ","=",$pwd)));
        $login=$this->conn->getRow($sql);
        if($login)
        {
            $_SESSION["adminuser"] = $user;
            $_SESSION["admininfo"] = $login;
			$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."admin",array("admin_lasttime"=>time()),array(array("admin_name","=",$user)));
            $this->conn->execute($strSQL);
            //更新最后登录日期admin_lasttime
            H(lang_cp::$_TGLOBAL['uilang']['login_successful'],"admin.php?tg=/index/");
        }
        else{
            H(lang_cp::$_TGLOBAL['uilang']['login_failed'],"?tg=/login");
        }
    }
}