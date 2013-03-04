<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-21
 **/
require_once("common/permission.php");
class Alipayset extends Tp{

	public function initInstance() {
	    $this->zfInsert();
	    $this->assign("wy_select",$this->getPayInfo(3));
	    $this->assign("zfb_select",$this->getPayInfo(1));
		$this->assign("tx_select",$this->getPayInfo(2));
        $this->assign("kq_select",$this->getPayInfo(4));
		$this->display("alipayset.html");
	}
	//查腾讯财付通
	public function getPayInfo($id){
	    $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."pay","*",array(array("id","=",$id)));
		return $this->conn->getRow($strSQL);
	}

	//更新
	public function zfInsert(){


	   if($_POST['submit']){
		 $pay_default = $_POST['pay_default'];
	     $ten_shopid=$_POST['ten_shopid'];
		 $ten_shoppwd=$_POST['ten_shoppwd'];
		 $ten_setting=$_POST['ten_setting'];
		 $bao_shopid=$_POST['bao_shopid'];
		 $bao_shoppwd=$_POST['bao_shoppwd'];
		 $bao_email=$_POST['bao_email'];
		 $bao_setting=$_POST['bao_setting'];
		 $chinabank_shopid=$_POST['chinabank_shopid'];
		 $chinabank_shoppwd=$_POST['chinabank_shoppwd'];
		 $chinabank_setting=$_POST['chinabank_setting'];
		 $bill_shopid=$_POST['bill_shopid'];
		 $bill_shoppwd=$_POST['bill_shoppwd'];
		 $bill_setting=$_POST['bill_setting'];
		 if($ten_shopid || $ten_shoppwd || $ten_setting){
			 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."pay",array("pay_merchant_id"=>"$ten_shopid","pay_password"=>"$ten_shoppwd","pay_status"=>"$ten_setting"),array(array("id","=","2")));
				if($this->conn->execute($strSQL)){
					$sqlstatus = true;
				}else{
					$sqlstatus = false;
				}
		}
		if($bao_shopid || $bao_shoppwd || $bao_email || $bao_setting){
			 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."pay",array("pay_merchant_id"=>"$bao_shopid","pay_password"=>"$bao_shoppwd","pay_email"=>"$bao_email","pay_status"=>"$bao_setting"),array(array("id","=","1")));
				if($this->conn->execute($strSQL)){
					$sqlstatus = true;
				}else{
					$sqlstatus = false;
				}
		}
		if($chinabank_shopid || $chinabank_shoppwd || $chinabank_setting){
			 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."pay",array("pay_merchant_id"=>"$chinabank_shopid","pay_password"=>"$chinabank_shoppwd","pay_status"=>"$chinabank_setting"),array(array("id","=","3")));
				if($this->conn->execute($strSQL)){
					$sqlstatus = true;
				}else{
					$sqlstatus = false;
				}
		}
		if($bill_shopid || $bill_shoppwd || $bill_setting){
			 $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."pay",array("pay_merchant_id"=>"$bill_shopid","pay_password"=>"$bill_shoppwd","pay_status"=>"$bill_setting"),array(array("id","=","4")));
				if($this->conn->execute($strSQL)){
                    $sqlstatus = true;

				}else{
                    $sqlstatus = false;

				}
		}
		$pay_str = SqlBuilder::buildUpdateSql(__PREFIX_TAB__."pay",array("pay_default"=>1),array(array("id","=",$pay_default)));
		$pay_strone = SqlBuilder::buildUpdateSql(__PREFIX_TAB__."pay",array("pay_default"=>0),array(array("id","!=",$pay_default)));
		$this->conn->execute($pay_str);
		$this->conn->execute($pay_strone);
        H(lang_cp::$_TGLOBAL['uilang']['editor'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/alipayset/");
		
	  }
	}
}
?>