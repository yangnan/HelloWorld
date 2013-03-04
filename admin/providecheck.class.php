<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  liuyang<liuyang@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 */
 require_once("common/permission.php");
class ProvideCheck extends Tp{
	public function initInstance(){
		$provideArr = $this->getData();
		$provideClass = $this->getProvideClass();
		$this->assign("provideArr",$provideArr);
		$this->assign("provideClass",$provideClass);
		$this->display("providecheck.html");
	}

	//意见反馈列表
	public function getProvideClass(){
	    //查询数据
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."provide","*");
		return $this->conn->getAll($strSQL);
	}

	public function getData(){
	    //查询数据
		$id = $_GET["id"];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__."provide","*",array(array("id","=",$id)));
		return $this->conn->getRow($strSQL);

	}

}
