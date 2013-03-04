<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/


class IndexRss extends Tp{

	public function initInstance() {
        $this->getData();
        $this->assign("seo",$this->getSeo());
	}

//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	//团购信息
	public function getData(){

		   $email=$_GET['email'];
		   $pubtime=time();
           $cityid = $_SESSION["cityid"];
           $ip=ip2long($_SERVER["REMOTE_ADDR"]);
		   if($email != "" && preg_match("/^(.*)@(.*)\.(com|cn|net|org|com.cn|hr|hk)$/",$email)){
					$strSQL = SqlBuilder::buildInsertSql(__PREFIX_TAB__ ."rss",array("email"=>"$email","cityid"=>"$cityid","pubtime"=>"$pubtime","	ip"=>"$ip","type"=>1));
					$this->conn->execute($strSQL);
					echo (lang_cp::$_TGLOBAL['uilang']['subscribe'].lang_cp::$_TGLOBAL['uilang']['success']);
			  }else{
					echo (lang_cp::$_TGLOBAL['uilang']['subscribe'].lang_cp::$_TGLOBAL['uilang']['failed']);
			  }

	}
}
?>
