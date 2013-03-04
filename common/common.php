<?PHP
if(!defined('TGROUPON')){
	exit('Access Denied');
}
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2010-11-05
 */
//解析url参数和model xiezhanhui
function parseUrl() {
    $tg = $_GET["tg"];//获取总参数
    $newUrl = split("/",$tg);
    unset($newUrl[0]);
    //开始重新建立索引
    $arrCount = sizeof($newUrl);
    $i = -1;

    for($j=1;$j<$arrCount+1;$j++)
    {
        $i++;
        if($j == 1)
        {
            $_GET["view"] = $newUrl[1];
			unset($newUrl[1]);
        }
		if(preg_match("/.admin\.php/",$_SERVER["SCRIPT_NAME"]))
		{
			//后台
			if(!($j%2) && $j>1)
			{
				$_GET[$newUrl[$j]] = $newUrl[$j+1];
			}

		}else{
			//前台
			if($j == 2)
			{
				$_GET["do"] = $newUrl[2];
			}
			else if($j%2 && $j>2)
			{
				$_GET[$newUrl[$j]] = $newUrl[$j+1];
			}
		}

    }
    unset($_GET["tg"]); //删除无用的GET值
//验证是否安装过，没安装需要跳转到安装目录
    isInstall();
    return $_GET;
}


//根据地区统计IP 2011-5-15 xiezhanhui
function countryPv()
{
	$conn = DBFactory::createDb(__DATANAME__);
	$today = strtotime(date("Y-m-d 00:00:00"));
	$strSQL = "SELECT count(country) AS sumcountry,country FROM ".__PREFIX_TAB__."traffic_statistics WHERE access_time>=$today GROUP BY country";
	$country = $conn->getAll($strSQL);

	for($i=0;$i<count($country);$i++)
	{
		$country_sum[$i] = $country[$i]["sumcountry"];
		$country_name[$i] = $country[$i]["country"];

	}
	return array("country_sum"=>($country_sum),"country_name"=>($country_name));
}
//根据来路进行统计
function getLocal() {
	$conn = DBFactory::createDb(__DATANAME__);
	$today = strtotime(date("Y-m-d 00:00:00"));
	$strSQL = "SELECT count(from_url) AS sumfrom_url,from_url FROM ".__PREFIX_TAB__."traffic_statistics WHERE access_time>=$today GROUP BY from_url";
	$country = $conn->getAll($strSQL);

	for($i=0;$i<count($country);$i++)
	{
		$sumfrom_url[$i] = $country[$i]["sumfrom_url"];
		$from_url[$i] = $country[$i]["from_url"];

	}
	return array("sumfrom_url"=>($sumfrom_url),"from_url"=>($from_url));
}




function isInstall() {
if (!file_exists('install/install.lock'))
    {
        exit("<script>alert('System Error,You are not Install!');location='install';</script>");
    }
}


/*
			if($_SERVER["SCRIPT_NAME"] == '/admin.php'){
				$_GET["id"] = $newUrl[2];
				//$_GET[$newUrl[2]] = $newUrl[3];
			}else{
				$_GET["do"] = $newUrl[2];
			}
*/

//获取当前文件名称的前缀

function getUrlFile() {
    $file = $_SERVER["PHP_SELF"];
    preg_match("/[a-zA-Z0-9]+\.php$/",$file,$arr);
    preg_match("/[a-zA-Z0-9]+/",$arr[0],$url);
    return $url[0];
}


//页面跳转方法 halt("内容","跳转到")||halt("内容","-1")
//编辑：jeffxie  2011-1-11 修改为可以不提示只跳转  使用方法：H("",'url');
function H($content="",$jump="",$back="") {
    @header("Content-type: text/html; charset=utf-8");
	echo "<script type='text/javascript'>";
	if($content)
	{
		echo "alert('".$content."');\n";
	}
    if($jump)
    {
        echo "location='".$jump."'\n";
    }
    if($back)
    {
        echo "history.go($back)";
    }
    echo "</script>";
}

//@author:xiezhanhui<jeffxie@gmail.com>
//@param 获取模板目录,默认为default
function T()
{
    $conn = DBFactory::createDb(__DATANAME__);
    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."template","template_path",array(array("template_default","=","1")));
    $result = $conn->getRow($strSQL);
	$_SESSION['tplpath']=$result['template_path']."/";
	if(preg_match("/.admin\.php/",$_SERVER["SCRIPT_NAME"])){
		$tpl = "admin/";
	}else{
		$tpl = !empty($_SESSION["tplpath"])?$_SESSION["tplpath"]:"default" . "/";
	}
	return $tpl;
}

//输出数组 调试用
function P($arr){
	print_r($arr);
	die;
}

//缓存函数,主要用作缓存define定义的全局函数 xiezhanhui 2011-01-14
function writeCache() {
global $cacheFileName;
$fp = fopen($cacheFileName,"wb");
//自定义函数，并且要有下划线，为TG系统定义的define
$defArrayKey = getDef();
$defArrayKeyLen = count($defArrayKey);
$funcfilecontent = "<?PHP\n";
$funcfilecontent .= "/*author:xiezhanhui<jeffxie@gmail.com> 缓存函数*/\n";
for($i=0;$i<$defArrayKeyLen;$i++)
{
$funcName = $defArrayKey[$i];
$funcfilecontent .= <<<EOT
function $funcName() {
    return $funcName;
}\n
EOT;
}
$funcfilecontent .="?>";
$cache	=	fwrite($fp, trim($funcfilecontent));
@fclose($fp);
}

function getLanguage()
{
	return $_SESSION["language"];
}
//获取define xiezhanhui
function getDef(){
    //自定义函数，并且要有下划线，为TG系统定义的define
    $defined_vars = get_defined_constants(true);
    $defArrayKey = array_keys($defined_vars["user"]);
    for($i=0;$i<count($defArrayKey);$i++)
    {
        if(preg_match("/^\_\_(.*)\_\_$/",$defArrayKey[$i]) && !empty($defArrayKey[$i]))
        {
            $newDefArrayKey[$i] = $defArrayKey[$i];
        }
    }
    sort($newDefArrayKey);
}
//loader,自动加载文件
function L($f="")
{
	if(!empty($f))
	{
		require_once($f);
	}else{
		require_once("language.loader.php");
		require_once("loader.php");
		require_once("cache.php");
	}
}

//文件删除操作 xiezhanhui 2011-4-8
function dir_clear($dir) {
    $directory = dir($dir);                //创建一个dir类(PHP手册上这么说的)，用来读取目录中的每一个文件
    while($entry = $directory->read()) {   //循环每一个文件,并取得文件名$entry
        $filename = $dir.'/'.$entry;       //取得完整的文件名，带路径的
        if(is_file($filename)) {           //如果是文件，则执行删除操作
            @unlink($filename);
        }
    }
    $directory->close();                   //关闭读取目录文件的类
}

//获取当前URL
function getUrl() {
    $url = parseUrl();
    $mod = $url["view"];
    $do = $_GET["do"];
    if(empty($mod) && empty($do))
    {
        return "?tg=/index/details";
    }
    return "?tg=/".$mod."/".$do;
}
//获取来路 2011-4-14 xiezhanhui
function getRefre() {
    $url = $_SERVER["HTTP_REFERER"];   //获取完整的来路URL
    $str = str_replace("http://","",$url);  //去掉http://
    $strdomain = explode("/",$str);               // 以“/”分开成数组
    $domain = !empty($url)?"http://" . $url:"";              //取第一个“/”以前的字符
    return $domain;
}


function getIp() {
    return ip2long($_SERVER["REMOTE_ADDR"]);
}

//计算团购周期，根据旧的起始和结束，计算出当前起始日期和结束时间
//周而复始，xiezhanhui<jeffxie@gmail.com> 2011-4-23
function countGrouponTime($oldstarttime,$oldendtime)
{
	//结束-起始=时间区间
	//当前起始+时间区间=结束日期
	$qujian = $oldendtime-$oldstarttime;
	$timestart = time();
	$endtime = $timestart+$qujian;
	return array("starttime"=>$timestart,"endtime"=>$endtime);
}


?>
