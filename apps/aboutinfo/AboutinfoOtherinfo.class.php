<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jialisong<jialisong@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-4-15
 **/

class AboutinfoOtherinfo extends Tp{

	public function initInstance() {

		$info = $this->getData();
        $this->assign("info",$info);
		$this->display("aboutinfo/otherinfo.html");
	}

//获取信息
    public function getData() {
        $id = $_GET["id"];
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."foot_nav","*",array(array("id","=",$id)));
	    $info = $this->conn->getRow($strSQL);
        return $info;

    }

}
?>