<?PHP
/**
 * 数据库配置类
 *
 */
class DBConfig
{
	/**
	 * 数据类类别选择
	 *
	 */
	const MASTER = 0;
	const SLAVE  = 1;
	const DB10 	 = 2;
	const Queue  = 3;
	const CRM    = 4;
	const TRADING_CENTER = 5;
	const SITE_SEARCH    = 6;
	const MANAGEMENT     = 7;

	/**
	 * 数据库服务器HOST
	 *
	 */
	const MASTER_SERVER      = "127.0.0.1";
	static $SLAVE_SERVER     = array("127.0.0.1");
	const SITE_SEARCH_SERVER = "127.0.0.1";
	const MANAGEMENT_SERVER  = "127.0.0.1";
	const DB10_SERVER		 = "127.0.0.1";
	const Queue_SERVER		 = "127.0.0.1";
	const CRM_SERVER         = "127.0.0.1";
	const TRADING_CENTER_SERVER = "127.0.0.1";

	/**
	 * 数据库链接所需的用户名、密码以及端口号
	 *
	 */
	const MASTER_USER_NAME     = "root";
	const MASTER_PASSWD        = "123456";
	const MASTER_PORT          = "3306";

	const SLAVE_USER_NAME      = "root";
	const SLAVE_PASSWD         = "123456";
	const SLAVE_PORT           = "3306";

	const DB10_USER_NAME       = "root";
	const DB10_PASSWD          = "123456";
	const DB10_PORT            = "3306";

	const SITE_SEARCH_NAME     = "root";
	const SITE_SEARCH_PASSWD   = "123456";
	const SITE_SEARCH_PORT     = "3306";

	const MANAGEMENT_USER_NAME = "root";
	const MANAGEMENT_PASSWD    = "123456";
	const MANAGEMENT_PORT      = "3306";

	const Queue_USER_NAME      = "root";
	const Queue_PASSWD         = "123456";
	const Queue_PORT           = "3306";

	const CRM_USER_NAME        = "root";
	const CRM_PASSWD           = "123456";
	const CRM_PORT             = "3306";

	const TRADING_CENTER_USER_NAME = "root";
	const TRADING_CENTER_PASSWD    = "123456";
	const TRADING_CENTER_PORT      = "3306";


	/**
	 * 数据库编码标识
	 *
	 */
	const ENCODING_GBK   = 0;
	const ENCODING_UTF8  = 1;
	const ENCODING_LATIN = 2;

}
?>
