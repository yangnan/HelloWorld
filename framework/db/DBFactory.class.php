<?PHP
/**
 * 数据库句柄工厂类，用于创建数据库句柄
 *
 */
require_once("DB.config.php");
require_once("DBMysqli.class.php");
class DBFactory
{
	/**
	 * createDb 为静态方法，用于创建数据库句柄
	 *
	 * @param string    $database 数据库名称
	 * @param int       $mode     数据库服务器
	 * @param int       $encoding 数据库编码
	 * @return	DBMysqli	数据库句柄
	 * @param $dbtype=one一个数据库,more多个数据库，负载均衡,需要配置DB.config.php
	 */
	static function createDb($database, $mode = DBConfig::SLAVE, $encoding = DBConfig::ENCODING_UTF8,$dbtype="one")
	{
		if($database && $dbtype=="more")
		{
			// 通过数据库服务器来设定HOST、USERNAME、PASSWORD以及PORT
			switch($mode)
			{
				case DBConfig::SLAVE:
					$serverCount = count(DBConfig::$SLAVE_SERVER);
					if(1 == $serverCount)
					{
						$host = DBConfig::$SLAVE_SERVER[0];
					}
					else
					{
						$indexServer = rand(0,$serverCount);
						$host = DBConfig::$SLAVE_SERVER[$indexServer];
					}
					$userName = DBConfig::SLAVE_USER_NAME;
					$passwd   = DBConfig::SLAVE_PASSWD;
					$port     = DBConfig::SLAVE_PORT;
					break;
				case DBConfig::MASTER:
					$host     = DBConfig::MASTER_SERVER;
					$userName = DBConfig::MASTER_USER_NAME;
					$passwd   = DBConfig::MASTER_PASSWD;
					$port     = DBConfig::MASTER_PORT;
					break;
				case DBConfig::SITE_SEARCH_SERVER:
					$host     = DBConfig::SITE_SEARCH_SERVER;
					$userName = DBConfig::SITE_SEARCH_NAME;
					$passwd   = DBConfig::SITE_SEARCH_PASSWD;
					$port     = DBConfig::SITE_SEARCH_PORT;
					break;
				case DBConfig::DB10:
					$host     = DBConfig::DB10_SERVER;
					$userName = DBConfig::DB10_USER_NAME;
					$passwd   = DBConfig::DB10_PASSWD;
					$port     = DBConfig::DB10_PORT;
					break;
				case DBConfig::Queue:
					$host     = DBConfig::Queue_SERVER;
					$userName = DBConfig::Queue_USER_NAME;
					$passwd   = DBConfig::Queue_PASSWD;
					$port     = DBConfig::Queue_PORT;
					break;
				case DBConfig::CRM:
					$host     = DBConfig::CRM_SERVER;
					$userName = DBConfig::CRM_USER_NAME;
					$passwd   = DBConfig::CRM_PASSWD;
					$port     = DBConfig::CRM_PORT;
					break;
				case DBConfig::TRADING_CENTER:
					$host     = DBConfig::TRADING_CENTER_SERVER;
					$userName = DBConfig::TRADING_CENTER_USER_NAME;
					$passwd   = DBConfig::TRADING_CENTER_PASSWD;
					$port     = DBConfig::TRADING_CENTER_PORT;
					break;
				case DBConfig::MANAGEMENT:
					$host     = DBConfig::MANAGEMENT_SERVER;
					$userName = DBConfig::MANAGEMENT_USER_NAME;
					$passwd   = DBConfig::MANAGEMENT_PASSWD;
					$port     = DBConfig::MANAGEMENT_PORT;
					break;
				default:
					$host = $mode;
					$userName = DBConfig::SLAVE_USER_NAME;
					$passwd   = DBConfig::SLAVE_PASSWD;
					$port     = DBConfig::SLAVE_PORT;
					break;
			}
			// 创建数据库句柄
			$dbConn = new DBMysqli($host, $userName, $passwd, $database, $port, $encoding);			
		}
		else if($database && $dbtype == "one")
		{
			
			$dbConn = new DBMysqli(db_config::$dbconfig["db_server"],db_config::$dbconfig["db_user"], db_config::$dbconfig["db_pwd"], $database, $port, $encoding);
			
		}
		else{
			$dbConn = null;
		}
		return $dbConn;
	}
}
