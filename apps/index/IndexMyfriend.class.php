<?PHP
/**
 * @copyright TGroupon (c)2010 www.boshengsoft.com
 * @author  xuqinghua<xuqinghua@boshengsoft.com>
 * @version $Id: , v 0.0.1 2011-1-13
 **/

class IndexMyfriend extends Tp{

     public function initInstance() {
        $this->assign("seo",$this->getSeo());
		$this->assign("path",$this->getData());
		$this->display("index/myfriend.html");
	}
//获取seo信息
    public function getSeo() {
        $getSelfUrl = getUrl();
        $strSQL = SqlBuilder::buildSelectSql(__PREFIX_TAB__ ."seo","*",array(array("seo_page_address","=",$getSelfUrl)));
	    $seoinfo = $this->conn->getRow($strSQL);
        return $seoinfo;

    }
	public function getData(){
		$uid = $_SESSION['uid'];
		if(!empty($uid)){
	       return $path = __DOMAIN__."/?tg=/index/register/uid/".$uid;
		}else{
		   $_SESSION['url1'] = __DOMAIN__."/?tg=/index/myfriend";
		   H("","?tg=/index/login");
		}
	}

}
