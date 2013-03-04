<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  jialisong<jialisong@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/

class AboutinfoSubscribe extends Tp{

	public function initInstance() {

		$this->postData();
        $this->assign("seo",$this->getSeo());
        $this->assign("citydata",$this->readCityData());
		$this->display("aboutinfo/subscribe.html");
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
		if($email = $_POST["email"]){
            //写数据
			$cityid = $_POST["cityid"];
			$pubtime=time();
			$ip=ip2long($_SERVER["REMOTE_ADDR"]);
            $regx = "/(.*)@(.*)(.com|.net|.cn|.com.cn|.hk)/";
            if(!preg_match($regx,$email))
            {
                H("邮件格式不正确","","-1");
                return false;
            }
            else{
                $strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."rss",array("email"=>"$email","cityid"=>"$cityid","pubtime"=>"$pubtime","	ip"=>"$ip","type"=>1));
                if($this->conn->execute($strSQL))
                {
                    H("订阅成功","","-1");
                }
            }

		}


	}

    public function readCityData() {
            //读城市数据
			$strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."city","*","","",array("id"=>"desc"));
			return $this->conn->getAll($strSQL);
    }

}
?>