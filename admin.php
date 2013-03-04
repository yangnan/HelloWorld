<?PHP
/**
 * 入口文件
 *
 * This is a入口文件 config files.
 *
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: admin.php, v 0.0.1 2011-1-7
 */
require_once("./define.php");
require_once("./config/db.config.php");
require_once("./config/tp.class.php");
require_once(__FRAME__."/page/page.class.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once(__FRAME__."/sendmail/email.class.php");
require_once(__FRAME__."/upload/UpFile.class.php");
require_once("./common/common.php");

$url = parseUrl();
$mod = $url["view"];
$sessionlist = array(); //哪里不需要session,就加入到这个数组里
if(!in_array($mod,$sessionlist))
{
	session_start();
}
L();
if($mod)
{
    include(__ADMINMOD__ . "/" . $url["view"] . ".class.php");
    $mod = $url["view"];
    $init = new $mod();
    $init->InitInstance();
}
else{
    include(__ADMINMOD__ . "/index.class.php");
    $mod = "Index";
    $init = new $mod();
    $init->InitInstance();
}