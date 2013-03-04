<?PHP
/**
 * 数据库基类，此类是抽象类，由子类实现具体方法
 *
 */
abstract class DBBase
{
	/**
	 * 链接数据库
	 * @param string $host     数据库服务器HOST
	 * @param string $userName 用户名
	 * @param string $passwd   密码
	 * @param string $database 数据库名称
	 * @param int    $port     数据库端口
	 * @return bool            链接成功与否
	 */
	abstract public function connect();
	/**
	 * 断开数据库链接
	 */
	abstract public function disconnect();
	/**
	 * 执行SQL语句
	 */
	abstract public function execute($sql);

	/**
	 * 将所有结果存入数组返回
	 */
	abstract public function getAll($sql);
	/**
	 * 获得一行记录
	 */
	abstract public function getRow($sql);

	/**
	 * 获得第一行的第一列的值
	 */
	abstract public function getOne($sql);

	/**
	 * 开始事务处理
	 */
	abstract public function begin();
	/**
	 * 提交事务处理
	 */
	abstract public function commit();
	/**
	 * 回滚事务处理
	 */
	abstract public function rollback();
	/**
	 * 返回上次操作的错误信息
	 */
	abstract public function lastError();
	/**
	 * 返回上次操作受影响的行数
	 */
	abstract public function lastAffected();
	/**
	 * 返回上次Insert数据的Id号码
	 */
	abstract public function lastInsertId();

    //返回写入的ID
    abstract public function lastID();

}
?>
