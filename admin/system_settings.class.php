<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
class System_settings extends Tp{

	public function initInstance() {
		$this->saveData();
		$this->assign("web_select",$this->web_select());

		$this->display("system_settings.html");
	}

    public function web_select(){
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."config","*");
	   return $this->conn->getRow($strSQL);
	}
	public function saveData(){
		//获取传过来的POST值
		if($_POST['Submit'])
		{
			$language = "cn";
			$website_state = $_POST['website_state'];
			$website_name = $_POST['website_name'];
			$tg_mode_set =$_POST["tg_mode_set"];
            $website = $_POST["website"];
            $admin_email = $_POST["admin_email"];
			$logo_links = $_POST["logo_links"];
            $contact = $_POST["contact"];
            $mobile = $_POST["mobile"];
            $smskey = $_POST["smskey"];
			if(empty($_FILES['photo']['name'])){
			    $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."config",array("config_contact"=>$contact,"config_mobile"=>$mobile,"config_sms_key "=>$smskey,"config_language"=>"$language","config_frum_status"=>"$website_state","config_website_name"=>"$website_name","config_mode_set "=>"$tg_mode_set","config_website"=>"$website","config_admin_email "=>"$admin_email","config_website_logo"=>"$logo_links"));
			}else{

				$upload = new UploadFile();
				$upload->maxSize = 3145728 ;
				$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
				$upload->savePath = './uploadfiles/';
				$upload->saveRule = uniqid;
				if($upload->upload()){
				   $info = $upload->getUploadFileInfo();
				}
				foreach($info as $key=>$val){
				  $pic.=$info[$key]["savename"];
				}
				$strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."config",array("config_contact"=>$contact,"config_mobile"=>$mobile,"config_sms_key "=>$smskey,"config_language"=>"$language","config_frum_status"=>"$website_state","config_website_name"=>"$website_name","config_mode_set "=>"$tg_mode_set","config_website"=>"$website","config_admin_email "=>"$admin_email","config_website_logo"=>"$pic"));
			}
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/system_settings/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
        }
    }
}
?>
