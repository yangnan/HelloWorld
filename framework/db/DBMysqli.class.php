<?PHP
/**
 * 继承自DBBase，封装Mysqli数据库管理类
 *
 */

require_once("DBBase.class.php");
class DBMysqli extends DBBase
{
	private $connected  = false;
	private $connection = null;

	private $host       = null;
	private $userName   = null;
	private $passwd     = null;
	private $database   = null;
	private $port       = null;
	private $encoding   = null;

	public function __construct($host, $userName, $passwd, $database, $port, $encoding)
	{
		$this->host     = $host;
		$this->userName = $userName;
		$this->passwd   = $passwd;
		$this->database = $database;
		$this->port     = $port;
		$this->encoding = $encoding;

	}

	/**
	 * 链接数据库
	 * @return bool            链接成功与否
	 */
	public function connect()
	{
		if(!$this->connected)
		{
			$this->connection = mysql_connect($this->host, $this->userName, $this->passwd, $this->database, $this->port);
		}
		else
		{
			return $this->connected;
		}
		if(false !== $this->connection)
		{
			$this->connected = true;
			switch($this->encoding)
			{
				case DBConfig::ENCODING_UTF8:
					mysql_query("set names utf8");
					break;
				case DBConfig::ENCODING_GBK:
					mysql_query("set names gbk");
					break;
				default:
					break;
			}

		}
		else
			throw new Exception($this->lastError());


		mysql_select_db($this->database);
		return $this->connected;
	}

	/**
	 * 断开数据库链接
	 */
	public function disconnect()
	{
		if($this->connection)
		{
			mysql_close($this->connection);
			$this->connected = false;
		}
	}

	/**
	 * 执行SQL语句。如果成功，返回受到影响的行数，如果失败，返回false。
	 */
	public function execute($sql)
	{
		$this->connect();
		if (mysql_query($sql))
			return mysql_affected_rows($this->connection);
		else
			throw new Exception($this->lastError());
	}

	/**
	 * 将所有结果存入数组返回
	 */
	public function getAll($sql)
	{
		$this->connect();
		if ($result = mysql_query($sql))
		{
			$res = array();
			while($row = mysql_fetch_assoc($result))
			{
				$res[] = $row;
			}
			mysql_free_result($result);
echo TPLDEBUG;
            if(TPLDEBUG === true)
            {
                echo "模板调试模式开启:";
                P($res);
            }
			return $res;
		}
		else
			throw new Exception($this->lastError());
	}

	/**
	 * 获得一行记录
	 */
	public function getRow($sql)
	{
		$this->connect();

		if($result = mysql_query($sql))
		{
			$res = mysql_fetch_assoc($result);
			mysql_free_result($result);
            if(TPLDEBUG === true)
            {
                echo "模板调试模式开启:";
                P($res);
            }
			return $res;
		}
		else
			throw new Exception($this->lastError());
	}

	/**
	  * 获得第一行中第一列的结果
	  */
	public function getOne($sql)
	{
		$this->connect();

		if($result = mysql_query($this->connection, $sql))
		{
			$res = mysql_fetch_row($result);
			mysql_free_result($result);
            if(TPLDEBUG === true)
            {
                echo "模板调试模式开启:";
                P($res[0]);
            }
			return $res[0];
		}
		else
			throw new Exception($this->lastError());
	}

	/**
	 * 开始事务处理
	 */
	public function begin()
	{
		if($this->execute('START TRANSACTION'))
			return true;
		else
			return false;

	}

	/**
	 * 提交事务处理
	 */
	public function commit()
	{
		$this->connect();
		if($this->connection->commit())
			return true;
		else
			return false;
	}

	/**
	 * 回滚事务处理
	 */
	public function rollback()
	{
		$this->connect();
		if($this->connection->rollback())
			return true;
		else
			return false;
	}

	/**
	 * 返回上次操作的错误信息
	 */
	public function lastError()
	{
		if(mysql_errno($this->connection))
		{
			return mysql_errno($this->connection).': '.mysql_error($this->connection);
		}
		else
		{
			return null;
		}
	}

	/**
	 * 返回上次操作受影响的行数
	 */
	public function lastAffected()
	{
		$this->connect();
		return mysql_affected_rows($this->connection);
	}

	/**
	 * 返回上次Insert数据的Id号码
	 */
	public function lastInsertId()
	{
		$id = $this->getRow('SELECT LAST_INSERT_ID() AS insertID');
		if($id !== false && !empty($id) && isset($id['insertID']))
		{
			return $id['insertID'];
		}
		else
		{
			return null;
		}
	}


	public function __destruct()
	{
		if($this->connected)
		{
			unset($this->connected);
		}
		if($this->connection)
		{
			unset($this->connection);
		}
	}

	/*
	 * 自动给每个value加上 引号
	 * 如果不需要引号，传递参数的时候，把value包裹在 array('raw'=>$value)即可
	 */
	public function autoInsert($table_name,&$values)
	{

		$f=array();
		$v=array();
		foreach($values as $key=>$value)
		{
			$f[]=$key;
			if(is_array($value))
			{
				$raw_string = $value['raw'];
				$v[]="$raw_string";
			}
			else
			{
				$v[]="'$value'";
			}
		}
		$field_sql=implode(',',$f);
		$value_sql = implode(',',$v);
		$sql="insert into $table_name( $field_sql ) values ( $value_sql )";
		return $this->Execute($sql);
	}


    public function lastID()
    {
        return mysql_insert_id();
    }
}
?>
