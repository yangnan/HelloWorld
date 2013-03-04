<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class VipUpdatematerial extends Tp{

	public function initInstance() {

		//登录中心
		$this->UpMaterial();
        $this->assign("seo",$this->getSeo());
		$this->assign("update_material",$this->getData());
		$this->display("vip/updatematerial.html");
	}

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//查出个人信息
	public function getData(){
		$uid = $_SESSION['uid'];
		$sql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=",$uid)));
		return $this->conn->getRow($sql);
	}
    //更新信息
	public function UpMaterial(){
	   if($_POST['submit']){
	      $uid = $_SESSION['uid'];
		  $password = $_POST['regpwd'];
		  $email = $_POST['regemail'];
          $users_phone = $_POST['regmobile'];
	      $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."users",array("	users_email"=>"$email","users_password"=>"$password","users_phone"=>$users_phone),array(array("id","=",$uid)));
			 if($this->conn->execute($strSQL)){
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"?tg=/vip/updatematerial/");
			 }else{
				H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			 }
	   }
	}

}
?>