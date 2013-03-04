<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/


class IndexRegister extends Tp{

	public function initInstance() {
		//注册中心
		$this->regData();
        $this->assign("seo",$this->getSeo());
		$this->display("index/register.html");
	}

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//注册信息
	public function regData(){
	   if($_POST['regemail']){
	        $email = $_POST['regemail'];
			$name  = $_POST['reguser'];
			$password  = $_POST['regpwd'];
			$password1  = $_POST['regpwd2'];
			$qq  = $_POST['regqq'];
			$users_phone  = $_POST['regmobile'];
			$users_city  = $_POST['users_city'];
			$users_regip  = ip2long($_SERVER["REMOTE_ADDR"]);
			$date_time  = time();
			if($password==$password1){
				$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("users_email","=",$email)));
				$listdata = $this->conn->getRow($strSQL);
				if($listdata){
				   echo 1;
				}else{
				   if(!empty($_GET['uid'])){
				       $sql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array("id","=",$_GET['uid'])));
				       $query = $this->conn->getRow($sql);
					   if($query['users_lastip']!=$users_regip){
					      $strSQL2 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."users",array("invite_id"=>$_GET['uid'],"users_email"=>"$email","users_realname"=>"$name","users_password"=>"$password","	users_qq"=>"$qq","users_phone"=>"$users_phone","users_city"=>"$users_city","users_regip"=>"$users_regip","users_regtime"=>"$date_time"));
						  $strSQL3 = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."users",array("users_money"=>$query['users_money']+10),array(array("id","=",$_GET['uid'])));
						     if($this->conn->execute($strSQL2) && $this->conn->execute($strSQL3)){
							   echo 2;
						     }else{
							   echo 4;
						     }
					   }else{
					      echo 5;//邀请IP和注册IP为同一个，不能注册"?tg=/index/details");
					   }
				   }else{
					   $strSQL1 = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."users",array("users_email"=>"$email","users_realname"=>"$name","users_password"=>"$password","	users_qq"=>"$qq","users_phone"=>"$users_phone","users_city"=>"$users_city","users_regip"=>"$users_regip","users_regtime"=>"$date_time"));

						//执行添加函数
						if($this->conn->execute($strSQL1)){
							echo 2;
						}else{
							echo 4;
						}
					}
				}
			}else{
			   echo 3;
			}
            exit();
		}

	}

}
?>