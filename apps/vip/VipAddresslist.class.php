<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class VipAddresslist extends Tp{

	public function initInstance() {

		//地址簿
        $this->getData();
        if(!empty($_GET["del"]))
        {
            $this->delAddress($_GET["del"]);
        }
        $this->assign("seo",$this->getSeo());
		$this->assign("uAddress",$this->getAddress());
		$this->display("vip/addresslist.html");
	}

    public function getAddress()
	{
		$uid = $_SESSION["uid"];
		$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users_address","*",array(array("users_id","=",$uid)));
		return $this->conn->getAll($strSQL);

	}


    public function delAddress($id) {
		 $strSQL = SqlBuilder::buildDeleteSql(__PREFIX_TAB__."users_address",array(array("id","=",$id)));

	    //执行删除函数
		if($this->conn->execute($strSQL)){
		    H("信息删除成功","?tg=/vip/addresslist");
		 }else{
		    H("信息删除失败","",-1);
		 }
    }
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//插入地址
	public function getData(){
	    if($_POST['submit']){
			$uid = $_SESSION['uid'];
			$provinces = $_POST['province'];
			$ctiy = $_POST['citylist'];
			$address = $_POST['address'];
			$zip = $_POST['zip'];
			$phone = $_POST['phone'];
			$telephone = $_POST['telephone'];
			$consignee = $_POST['consignee'];
			$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."users_address",array("users_id"=>"$uid","users_provice_id"=>"$provinces","users_city_id"=>"$ctiy","users_street"=>"$address","users_postal"=>"$zip","users_phone"=>"$phone","users_mobile"=>"$telephone","users_consignee"=>"$consignee"));

					//执行添加函数
					if($this->conn->execute($strSQL)){
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"",-1);
					}else{
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
					}
		}
	}

}
?>