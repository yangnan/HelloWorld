<?PHP
/**
 * @copyright JeffCMS (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2010-11-05
 */
global $cacheFileName;
$cacheFileName = "common/cache.php";
if(file_exists($cacheFileName)) //判断缓存文件是否存在
{
    $cacheTime = ceil((time()-filemtime($cacheFileName))/60);
    if($cacheTime>10)//缓存时间为10分 xiezhanhui
    {

        writeCache();
    }

}
else{
    writeCache();
}