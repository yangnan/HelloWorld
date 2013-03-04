<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2010-11-05
 */
$filename = getUrlFile();
if($filename == "admin")
{
    if($_SESSION["adminuser"] != "")
    {
       // echo "登录了";
    }
    else{
        H("您还未登录","?tg=/login","");
    }
}
else if($filename == "index"){
    if($_SESSION["username"] != "")
    {
       // echo "登录了";
    }
    else{
        H("您还未登录","?tg=/index/login","");
    }
}