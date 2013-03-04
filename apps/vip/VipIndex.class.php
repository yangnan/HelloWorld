<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class VipIndex extends Tp{

	public function initInstance() {
		//登录中心
		$this->getSession();
        $this->assign("seo",$this->getSeo());
		$this->assign("vip",$this->getData());
		$this->display("vip/vipdefault.html");
	}

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//验证登录信息
	public function getData(){
	    $uid=$_SESSION['uid'];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=",$uid)));
		return $this->conn->getRow($strSQL);
	}
    public function getSession(){
	   $logstate=$_GET['logstate'];
	   if($logstate == "logout"){
	      session_destroy();
		  H(lang_cp::$_TGLOBAL['uilang']['exit'].lang_cp::$_TGLOBAL['uilang']['success'],"?tg=/index/details");
	   }
	}
}
?>
