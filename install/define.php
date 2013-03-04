<?PHP
/**
 * @copyright Jeff (c)2010 www.boshengsoft.com
 * @author jeffxie <jeffxie@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-03-11
 */
error_reporting(0);
session_start();
define('TG_INSTALL', TRUE);
define('TG_ROOT', str_replace('\\', '/', substr(dirname(__FILE__), 0, -7)));