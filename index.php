<?PHP
/**
 * 入口文件
 *
 * This is a入口文件 config files.
 *
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@gmail.com>
 * @version $Id: index.php, v 0.0.1 2010-8-20
 */
require_once("./define.php");
require_once("./config/db.config.php");
require_once(__FRAME__."/page/page.class.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once(__FRAME__."/sendmail/email.class.php");
require_once("./common/common.php");
require_once("./config/tp.class.php");
$url = parseUrl();
$mod = $url["view"];
$do = $_GET["do"];
$sessionlist = array("createpay");
if(!in_array($do,$sessionlist))
{
	session_start();
}
L();
if($mod)
{
    include(__MOD__ ."/".$url["view"]. "/" . ucfirst($url["view"]) . ucfirst($do) . ".class.php");
    $mod = ucfirst($url["view"]) . ucfirst($do);
    $init = new $mod();
    $init->InitInstance();
}
else{
    include(__MOD__ . "/index/Index" ."Details.class.php");
    $mod = "IndexDetails";
    $init = new $mod();
    $init->InitInstance();
}
require_once("./common/closed.php");