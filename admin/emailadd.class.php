<?PHP

/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-01-24
 **/
require_once("common/permission.php");
class Emailadd extends Tp{

	public function initInstance() {
		$this->saveData();
        if(!$_POST['derived']){
		  $this->display("emailadd.html");
		}
	}


	public function saveData(){

		//获取传过来的POST值
		if($_POST['submit']){
		    if(!empty($_POST['email'])){//email
				$email = trim($_POST['email']);
				$pubtime=time();
				$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."email",array("email_name"=>"$email","email_time"=>"$pubtime"));
					//执行添加函数
					if($this->conn->execute($strSQL)){
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/emaillist/");
					}else{
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
					}
		     }else if($_FILES['import']){

			    $upload = new UploadFile();
				$upload->maxSize = 3145728 ;
				$upload->allowExts = array('txt');
				$upload->savePath = './uploadfiles/txt/';
				$upload->saveRule = uniqid;
				if($upload->upload()){
				   $info = $upload->getUploadFileInfo();
				}
				foreach($info as $key=>$val){
				  $name.=$info[$key]["savename"];
				}
				$name_one='uploadfiles/txt/'.$name;
				$row = file($name_one); //读出文件中内容到一个数组当中
				$pubtime1=time();
				for ($i=0;$i<count($row);$i++)//开始导入记录
				{
					$fields=explode(" ",$row[$i]);//读取数据到数组中，以空格为分格符
					$email1=trim($fields[0]);
					$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."email",array("email_name"=>"$email1","email_time"=>"$pubtime1"));
					//执行添加函数
					if($this->conn->execute($strSQL)){
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['success'],"./admin.php?tg=/emaillist/");
					}else{
						H(lang_cp::$_TGLOBAL['uilang']['add'].lang_cp::$_TGLOBAL['uilang']['failed'],"",-1);
					}

				}

			 }

        }
		if($_POST['derived']){
		   $filename = date('YmdHis').".txt";
		   header("Content-type:text/plain");
		   header("Content-Disposition:attachment;filename=".$filename);
		   $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."email","*");
		   $arr=$this->conn->getAll($strSQL);
		   foreach($arr as $key=>$val){
			  $data .= iconv('utf-8','gb2312',$val['email_name'])."\r\n";

		   }
		 }
    }
}