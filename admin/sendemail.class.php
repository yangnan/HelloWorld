<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/
require_once("common/permission.php");
L("common/json.php");
L("framework/sendmail/email.class.php");
class Sendemail extends Tp{

	public function initInstance() {

		$this->saveData();
        $this->assign("send",$this->send());
		$this->display("sendemail.html");
	}

    //获取地址
	public function send(){
	   $id=$_GET['id'];
	   $json=new Services_JSON();
	   $select=$json->decode(stripslashes($id));
	   for($i=0;$i<count($select);$i++){
	      $a.=$select[$i].",";
	   }
	   return $arr=substr($a,0,strlen($a)-1);

	}
	public function saveData(){
		//获取传过来的POST值

		   if($_POST['submit']){
			   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."mailseting","*");
			   $arr=$this->conn->getRow($strSQL);
			   $email_recipient=$_POST['email_recipient'];
			   $email_arr=explode(",",$email_recipient);
				$smtpserver = $arr['smtp_server'];//SMTP服务器
				$smtpserverport =$arr['smtp_port'];//SMTP服务器端口
				$smtpusermail = $arr['smtp_mailboxes'];//SMTP服务器的用户邮箱
				$smtpuser = $arr['smtp_accounts'];//SMTP服务器的用户帐号
				$smtppass = $arr['smtp_password'];//SMTP服务器的用户密码
				$mailsubject = $_POST['email_theme'];//邮件主题
				$mailsubject = "=?UTF-8?B?".base64_encode($mailsubject)."?=";  //解决标题乱码
				$mailbody = $_POST['send_email'];//内容
				$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = FALSE;//是否显示发送的调试信息
				foreach($email_arr as $key=>$val){
					$smtpemailto = $val;//发送给谁
					$smtp->sendmail($smtpemailto, $smtpusermail, $mailsubject, $mailbody, $mailtype);
				 }
					//执行添加函数
				if($this->conn->execute($strSQL)){
					H(lang_cp::$_TGLOBAL['uilang']['send'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/emaillist/");
				}else{
					H(lang_cp::$_TGLOBAL['uilang']['send'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
				}
           }
    }
}
?>