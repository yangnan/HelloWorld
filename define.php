<?php
/**
 * Language packages
 *
 * This is a Language packages config files.
 *
 * @copyright JeffCMS (c)2010 www.thinkgroupon.com
 * @author jeffxie <jeffxie@gmail.com>
 * @version : template.php, v 0.0.1 2010-8-20
 */
error_reporting(0);
define('__WWW_PATH__','tg_beta');
define('__ROOT__',dirname(__FILE__)); //网站根
define('__MOD__',__ROOT__  . '/apps'); //模型
define('__ADMINMOD__',__ROOT__  . '/admin'); //后台模型 2011-1-7 jeffxie
define('__FRAME__',__ROOT__  . '/framework'); //框架
define('__STATIC__','static');
define('__UPLOADFILES__','uploadfiles');
define('TGROUPON','tg'); //授权
define('__PREFIX_TAB__','tg_');//数据表前缀
define('__DATANAME__','tgbeta'); //数据库名称
define('__DOMAIN__','http://localhost/tg_beta'); //当前域名,有可能是二级域名,有可能是二级目录，如www.g.com/test/thinkgroupon
define('SQLDEBUG',false); //false为不在调试模式下输出SQL语句,true为打开(数据库调试模式)
define('TPLDEBUG',false); //页面信息调试
?>