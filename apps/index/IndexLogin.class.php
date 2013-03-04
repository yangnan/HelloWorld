<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jialisong<jialisong@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/

class IndexLogin extends Tp{

	public function initInstance() {

		//登录中心
		$uid = $_SESSION['uid'];
		$this->assign("uid",$uid);
        $this->assign("seo",$this->getSeo());
		$this->postData();
		$this->display("index/login.html");
	}

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//验证登录信息
	public function postData(){
		if($_POST["loguser"]){
			$users_email = $_POST["loguser"];
			$users_password = $_POST["logpwd"];
            $regx = "/(.*)@(.*)(.com|.net|.cn|.com.cn|.hk)/";
            if(preg_match($regx,$users_email))
            {
                $field = "users_email";
            }
            else{
                $field = "users_realname";
            }

			$login_time=time();
			$login_ip=ip2long($_SERVER["REMOTE_ADDR"]);
            //如果是邮件，就用邮件登陆，否则用用户名

			$sql = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."users","*",array(array($field,"=",$users_email),array("users_password ","=",$users_password)));
			$login=$this->conn->getRow($sql);
			if($login){
			   $_SESSION['uid']=$login['id'];
               $_SESSION['username'] = $login['users_realname'];
			   $url = $_SESSION['url1'];
			   $url1 = __DOMAIN__."/?tg=/index/myfriend";  //获取完整的来路
			   if($url==$url1){
                   echo 1;
			      //"?tg=/index/myfriend";
			   }else{
			      echo 2;//"?tg=/vip/vip";
			   }
			   $strSQL = SqlBuilder::buildUpdateSql(__PREFIX_TAB__ ."users",array("users_lastime"=>"$login_time","users_lastip"=>"$login_ip"),array(array("id","=",$login['id'])));
					//执行添加函数
					$this->conn->execute($strSQL);
			}else{
			   echo 3;//echo "登录失败,请检查用户名或密码";
			}
            exit();
		}
	}

}
?>