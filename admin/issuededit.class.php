<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
L("common/json.php");
class Issuededit extends Tp{

	public function initInstance() {
	    $json=new Services_JSON();
		$this->saveData();
		$arr=$this->finds();
		$this->assign("expenses",$this->expenses());
		$arr_list=$arr['groupon_pic'];
		$arr_a=explode(",",$arr_list);
		$this->assign("img1",$arr_a[0]);
		$this->assign("img2",$arr_a[1]);
		$this->assign("img3",$arr_a[2]);
		$this->assign("img4",$arr_a[3]);
		$this->assign("allimg",addslashes($json->encode($arr_a)));
		$this->assign("finds",$this->finds());
		$this->assign("issued",$this->issued());
		$this->assign("business",$this->business());
		$this->assign("city",$this->city());

		$this->display("issuededit.html");
	}
	//分类查找xuqinghua
	public function issued(){
	   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_class","*");
	   return $this->conn->getAll($strSQL);
	}
	//城市查找 xuqinghua
    public function city(){
	   $strSQL1 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*");
	   return $this->conn->getAll($strSQL1);
	}
	//商家 xuqinghua
	public function business(){
	   $strSQL2 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seller","*");
	   return $this->conn->getAll($strSQL2);
	}
	//查找所有xuqinghua
	public function finds(){
	   $id=$_GET['id'];
	   $strSQL3 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."groupon_info","*",array(array("id","=","$id")));
	   return $this->conn->getRow($strSQL3);
	}
	//快递公司
	public function expenses(){
	   $strSQL4 = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."express","*");
	   return $this->conn->getAll($strSQL4);
	}
	public function saveData(){
		//获取传过来的POST值
		$json=new Services_JSON();
		if($_POST)
		{
			unset($_POST['Submit']);

			$groupon_class_id=$_POST['groupon_class_id'];
			$groupon_title=$_POST['groupon_title'];
			$groupon_shop_name=$_POST['groupon_shop_name'];
			$groupon_city_id=$_POST['groupon_city_id'];
			$groupon_seller_id=$_POST['groupon_seller_id'];
			$groupon_distribution_id=$_POST['groupon_distribution_id'];
			$groupon_company_id=$_POST['groupon_company_id'];
			$groupon_rebate=$_POST['groupon_rebate'];
			$groupon_expenses=$_POST['groupon_expenses'];
			$groupon_singular=$_POST['groupon_singular'];
			$groupon_prime_price=$_POST['groupon_prime_price'];
			$groupon_present_price=$_POST['groupon_present_price'];
			$groupon_num=$_POST['groupon_num'];
			$groupon_contact_name=$_POST['groupon_contact_name'];
			$groupon_mobile_phone=$_POST['groupon_mobile_phone'];
			$groupon_telephone=$_POST['groupon_telephone'];
			$groupon_email=$_POST['groupon_email'];
			$groupon_msn=$_POST['groupon_msn'];
			$groupon_qq=$_POST['groupon_qq'];
			$groupon_website=$_POST['groupon_website'];
			$groupon_address=$_POST['groupon_address'];
			$groupon_display_index=$_POST['groupon_display_index'];
			$groupon_tips=$_POST['groupon_tips'];
			$groupon_content=$_POST['groupon_content'];
	        $groupon_start_time=strtotime($_POST['groupon_start_time']);
			$groupon_end_time=strtotime($_POST['groupon_end_time']);
			$pubtime= time();
            $mapstatus = $_POST["mapstatus"];
            $theysay = $_POST["theysay"];
            $websitesay = $_POST["websitesay"];
			$groupon_stop = $_POST["groupon_stop"];
            $shopman = $_POST["shopman"];
            $language = getLanguage();
			$id=$_GET['id'];


			if(empty($_FILES['groupon_pic']['name'])){
			  $strSQL3 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."groupon_info",array("groupon_class_id"=>"$groupon_class_id","groupon_title"=>"$groupon_title","groupon_shop_name"=>"$groupon_shop_name","groupon_city_id"=>"$groupon_city_id","groupon_seller_id"=>"$groupon_seller_id","groupon_distribution_id"=>"$groupon_distribution_id","groupon_company_id"=>"$groupon_company_id","groupon_rebate"=>"$groupon_rebate","groupon_expenses"=>"$groupon_expenses","groupon_singular"=>"$groupon_singular","groupon_prime_price"=>"$groupon_prime_price","groupon_present_price"=>"$groupon_present_price","groupon_num"=>"$groupon_num","groupon_start_time"=>"$groupon_start_time","groupon_end_time"=>"$groupon_end_time","groupon_contact_name"=>"$groupon_contact_name","groupon_mobile_phone"=>"$groupon_mobile_phone","groupon_telephone"=>"$groupon_telephone","groupon_email"=>"$groupon_email","groupon_msn"=>"$groupon_msn","groupon_qq"=>"$groupon_qq","groupon_website"=>"$groupon_website","groupon_website"=>"$groupon_website","groupon_address"=>"$groupon_address","groupon_tips"=>"$groupon_tips","groupon_language"=>$language,"groupon_content"=>"$groupon_content","pubtime"=>"$pubtime","shopman"=>$shopman,"mapstatus"=>$mapstatus,"theysay"=>$theysay,"websitesay"=>$websitesay,"groupon_stop"=>$groupon_stop),array(array("id","=","$id")));

				//执行添加函数
			}else{
				$upload = new UploadFile();
				$upload->maxSize = 3145728 ;
				$upload->allowExts = array('jpg', 'gif', 'png', 'jpeg');
				$upload->savePath = './uploadfiles/';
				$upload->saveRule = uniqid;
				if($upload->upload()){
				   $info = $upload->getUploadFileInfo();
				}
				$groupon_pic=$info[0]["savename"];
				$new_img=$groupon_pic;
			   $strSQL3 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."groupon_info",array("groupon_class_id"=>"$groupon_class_id","groupon_title"=>"$groupon_title","groupon_shop_name"=>"$groupon_shop_name","groupon_city_id"=>"$groupon_city_id","groupon_seller_id"=>"$groupon_seller_id","groupon_distribution_id"=>"$groupon_distribution_id","groupon_company_id"=>"$groupon_company_id","groupon_rebate"=>"$groupon_rebate","groupon_expenses"=>"$groupon_expenses","groupon_singular"=>"$groupon_singular","groupon_prime_price"=>"$groupon_prime_price","groupon_present_price"=>"$groupon_present_price","groupon_num"=>"$groupon_num","groupon_start_time"=>"$groupon_start_time","groupon_end_time"=>"$groupon_end_time","groupon_pic"=>"$new_img","groupon_contact_name"=>"$groupon_contact_name","groupon_mobile_phone"=>"$groupon_mobile_phone","groupon_telephone"=>"$groupon_telephone","groupon_email"=>"$groupon_email","groupon_msn"=>"$groupon_msn","groupon_qq"=>"$groupon_qq","groupon_website"=>"$groupon_website","groupon_website"=>"$groupon_website","groupon_address"=>"$groupon_address","groupon_language"=>$language,"groupon_tips"=>"$groupon_tips","groupon_content"=>"$groupon_content","pubtime"=>"$pubtime","mapstatus"=>$mapstatus,"theysay"=>$theysay,"websitesay"=>$websitesay,"shopman"=>$shopman,"groupon_stop"=>$groupon_stop),array(array("id","=","$id")));
			}

				if($this->conn->execute($strSQL3)){
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/issuedlist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
			    }
		}
	}


}
?>