<?PHP
require_once("../define.php");
require_once("../config/db.config.php");
require_once(__FRAME__."/page/page.class.php");
require_once(__FRAME__."/db/DB.config.php");
require_once(__FRAME__."/db/DBFactory.class.php");
require_once(__FRAME__."/db/SqlBuilder.class.php");
require_once(__FRAME__."/sendmail/email.class.php");
require_once(__FRAME__."/ip/ip.class.php");
require_once(__ROOT__ . "/common/common.php");
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: , v 3.3 2011-5-13
 */
$tmpIp = $_SERVER["REMOTE_ADDR"];
$QQWry=new QQWry;
$ifErr=$QQWry->QQWry($tmpIp);
$country = $QQWry->Country;
$local = $QQWry->Local;
//统计访问流量,ip,来自哪里,访问的页面地址,访问时间
$ip = ip2long($tmpIp);
$viewpage = $_GET["url"];
$refre = $_GET["refr"];
$pagenow = empty($refre)?$viewpage:$refre; //当前页面,如果没有来路,就将当前页面发送给后端
$time = time();
$conn = DBFactory::createDb(__DATANAME__);
//查询IP如果在数据库里，距离当前多久，如果达到3分钟重复刷新一个也面，则不记录
$getDBIP = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."traffic_statistics","*",array(array("ip","=",$ip),array("visit_url","=",$viewpage)),array(0,1),array("access_time"=>"DESC"));
$haveIP = $conn->getRow($getDBIP);

$tmp = 3*60;//间隔的秒数,同一个IP 3分钟刷新一次
$now = time();
$iptime = $now-$haveIP["access_time"]; //等于间隔时间
if($iptime>=$tmp || empty($haveIP)) //小于3分钟不能写入数据库
{

$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."traffic_statistics",array("ip"=>"$ip","visit_url"=>"$viewpage","from_url"=>"$pagenow","access_time"=>"$time","country"=>$country,"local"=>$local));
//执行添加函数
$conn->execute($strSQL);
}
?>